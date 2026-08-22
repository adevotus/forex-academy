<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PendingController extends Controller
{
    public function show(): View|RedirectResponse
    {
        $user = Auth::user();

        if ($user->isApproved()) {
            return redirect()->route('member.dashboard');
        }

        return view('member.pending', ['user' => $user]);
    }
}
