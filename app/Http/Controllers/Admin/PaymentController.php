<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Services\PaymentApprovalService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PaymentController extends Controller
{
    public function __construct(protected PaymentApprovalService $approvals) {}

    public function index(Request $request): View
    {
        $query = Payment::with(['user', 'payable'])->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        } else {
            $query->where('status', 'pending');
        }

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        $payments = $query->paginate(20)->withQueryString();

        return view('admin.payments.index', compact('payments'));
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
