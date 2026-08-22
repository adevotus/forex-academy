<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class BillingController extends Controller
{
    public function index(): View
    {
        $payments = Auth::user()->payments()->latest()->get();

        return view('member.billing.index', compact('payments'));
    }
}
