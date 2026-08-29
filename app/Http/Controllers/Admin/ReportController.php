<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ReportController extends Controller
{
    public function index(Request $request): View
    {
        $period = (int) $request->get('period', 12); // months back
        if (! in_array($period, [3, 6, 12])) $period = 12;

        $from = now()->subMonths($period - 1)->startOfMonth();

        /* ── Payment KPIs ─────────────────────────────────── */
        $totalRevenue      = Payment::where('status', 'approved')->sum('amount'); // cents
        $thisMonthRevenue  = Payment::where('status', 'approved')
                                ->whereMonth('created_at', now()->month)
                                ->whereYear('created_at',  now()->year)
                                ->sum('amount');
        $pendingPayments   = Payment::where('status', 'pending')->count();
        $approvedPayments  = Payment::where('status', 'approved')->count();
        $rejectedPayments  = Payment::where('status', 'rejected')->count();

        /* ── Member KPIs ──────────────────────────────────── */
        $totalMembers  = User::where('role', 'member')->count();
        $activeMembers = User::where('role', 'member')->where('status', 'approved')->count();
        $newThisMonth  = User::where('role', 'member')
                            ->whereMonth('created_at', now()->month)
                            ->whereYear('created_at',  now()->year)
                            ->count();

        /* ── Monthly revenue (approved payments) ──────────── */
        $monthlyRevenue = Payment::where('status', 'approved')
            ->where('created_at', '>=', $from)
            ->select(
                DB::raw('YEAR(created_at)  as year'),
                DB::raw('MONTH(created_at) as month'),
                DB::raw('SUM(amount)       as total'),
                DB::raw('COUNT(*)          as count')
            )
            ->groupBy('year', 'month')
            ->orderBy('year')->orderBy('month')
            ->get();

        /* ── Monthly registrations ────────────────────────── */
        $monthlyRegistrations = User::where('role', 'member')
            ->where('created_at', '>=', $from)
            ->select(
                DB::raw('YEAR(created_at)  as year'),
                DB::raw('MONTH(created_at) as month'),
                DB::raw('COUNT(*)          as count')
            )
            ->groupBy('year', 'month')
            ->orderBy('year')->orderBy('month')
            ->get();

        /* ── Monthly site visits ──────────────────────────── */
        $monthlyVisits = DB::table('site_visits')
            ->where('visited_at', '>=', $from)
            ->select(
                DB::raw('YEAR(visited_at)  as year'),
                DB::raw('MONTH(visited_at) as month'),
                DB::raw('COUNT(*)          as total'),
                DB::raw('COUNT(DISTINCT ip_address) as unique_total')
            )
            ->groupBy('year', 'month')
            ->orderBy('year')->orderBy('month')
            ->get();

        /* ── Payment type breakdown ───────────────────────── */
        $paymentByType = Payment::where('status', 'approved')
            ->select('type', DB::raw('COUNT(*) as count'), DB::raw('SUM(amount) as total'))
            ->groupBy('type')
            ->get();

        /* ── Member status breakdown ──────────────────────── */
        $memberStatuses = User::where('role', 'member')
            ->select('status', DB::raw('COUNT(*) as count'))
            ->groupBy('status')
            ->get();

        /* ── Build aligned monthly arrays ─────────────────── */
        $labels            = [];
        $revenueData       = [];
        $registrationData  = [];
        $visitData         = [];
        $uniqueVisitData   = [];

        for ($i = $period - 1; $i >= 0; $i--) {
            $date   = now()->subMonths($i);
            $y      = (int) $date->format('Y');
            $m      = (int) $date->format('n');
            $labels[] = $date->format('M Y');

            $rev = $monthlyRevenue->first(fn($r) => (int)$r->year === $y && (int)$r->month === $m);
            $revenueData[] = $rev ? round((float)$rev->total / 100, 2) : 0;

            $reg = $monthlyRegistrations->first(fn($r) => (int)$r->year === $y && (int)$r->month === $m);
            $registrationData[] = $reg ? (int)$reg->count : 0;

            $vis = $monthlyVisits->first(fn($r) => (int)$r->year === $y && (int)$r->month === $m);
            $visitData[]       = $vis ? (int)$vis->total        : 0;
            $uniqueVisitData[] = $vis ? (int)$vis->unique_total : 0;
        }

        /* ── Linear-regression predictions (next 3 months) ── */
        $predictLabels         = [];
        $revenuePredict        = $this->linearPredict($revenueData,       3);
        $registrationPredict   = $this->linearPredict($registrationData,  3);
        $visitPredict          = $this->linearPredict($visitData,         3);

        for ($i = 1; $i <= 3; $i++) {
            $predictLabels[] = now()->addMonths($i)->format('M Y');
        }

        /* ── Recent payments table (last 20, filterable) ─── */
        $statusFilter = $request->get('status');
        $typeFilter   = $request->get('type');

        $recentPayments = Payment::with('user')
            ->when($statusFilter, fn($q) => $q->where('status', $statusFilter))
            ->when($typeFilter,   fn($q) => $q->where('type',   $typeFilter))
            ->latest()
            ->limit(20)
            ->get();

        return view('admin.reports.index', compact(
            'period',
            'totalRevenue', 'thisMonthRevenue',
            'pendingPayments', 'approvedPayments', 'rejectedPayments',
            'totalMembers', 'activeMembers', 'newThisMonth',
            'labels', 'revenueData', 'registrationData', 'visitData', 'uniqueVisitData',
            'paymentByType', 'memberStatuses',
            'predictLabels', 'revenuePredict', 'registrationPredict', 'visitPredict',
            'recentPayments', 'statusFilter', 'typeFilter'
        ));
    }

    /* ── Simple linear regression → next N predictions ─── */
    private function linearPredict(array $data, int $steps): array
    {
        $n = count($data);
        if ($n < 2) {
            return array_fill(0, $steps, end($data) ?: 0);
        }

        $sumX = $sumY = $sumXY = $sumX2 = 0.0;
        foreach ($data as $i => $y) {
            $sumX  += $i;
            $sumY  += $y;
            $sumXY += $i * $y;
            $sumX2 += $i * $i;
        }

        $denom = $n * $sumX2 - $sumX * $sumX;
        if ($denom == 0) {
            return array_fill(0, $steps, round(end($data), 2));
        }

        $slope     = ($n * $sumXY - $sumX * $sumY) / $denom;
        $intercept = ($sumY - $slope * $sumX) / $n;

        $predictions = [];
        for ($i = 0; $i < $steps; $i++) {
            $predictions[] = max(0, round($intercept + $slope * ($n + $i), 2));
        }
        return $predictions;
    }
}
