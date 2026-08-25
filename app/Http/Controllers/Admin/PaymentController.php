<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Services\PaymentApprovalService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PaymentController extends Controller
{
    public function __construct(protected PaymentApprovalService $approvals) {}

    public function index(Request $request): View
    {
        $query = Payment::with(['user', 'payable'])->latest();

        // Default: show ALL (empty string = no filter)
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if ($request->filled('search')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        $payments = $query->paginate(25)->withQueryString();

        $stats = [
            'all'      => Payment::count(),
            'pending'  => Payment::where('status', 'pending')->count(),
            'approved' => Payment::where('status', 'approved')->count(),
            'rejected' => Payment::where('status', 'rejected')->count(),
            'revenue'  => Payment::where('status', 'approved')->sum('amount'),
        ];

        return view('admin.payments.index', compact('payments', 'stats'));
    }

    public function export(Request $request): Response
    {
        $query = Payment::with('user')->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        $payments = $query->get();

        $csv  = "Name,Email,Type,Amount,Currency,Status,Submitted,Approved At\n";
        foreach ($payments as $p) {
            $csv .= implode(',', [
                '"' . addslashes($p->user->name ?? '') . '"',
                '"' . addslashes($p->user->email ?? '') . '"',
                '"' . $p->typeLabel() . '"',
                $p->amount,
                $p->currency,
                $p->status,
                $p->created_at->format('Y-m-d H:i'),
                $p->approved_at ? $p->approved_at->format('Y-m-d H:i') : '',
            ]) . "\n";
        }

        return response($csv, 200, [
            'Content-Type'        => 'text/csv',
            'Content-Disposition' => 'attachment; filename="payments-' . now()->format('Y-m-d') . '.csv"',
        ]);
    }

    public function updateAmount(Request $request, Payment $payment): RedirectResponse
    {
        abort_if($payment->status !== 'pending', 403, 'Can only edit pending payments.');

        $request->validate([
            'amount' => ['required', 'numeric', 'min:1'],
        ]);

        $payment->update(['amount' => $request->amount]);

        return back()->with('status', 'Payment amount updated to ' . $payment->currencySymbol() . number_format($request->amount, 2) . '.');
    }

    public function approve(Request $request, Payment $payment): RedirectResponse
    {
        $this->approvals->approve($payment, Auth::user(), $request->input('admin_note'));
        return back()->with('status', 'Payment approved — access granted to the member.');
    }

    public function reject(Request $request, Payment $payment): RedirectResponse
    {
        $this->approvals->reject($payment, Auth::user(), $request->input('admin_note'));
        return back()->with('status', 'Payment rejected.');
    }
}
