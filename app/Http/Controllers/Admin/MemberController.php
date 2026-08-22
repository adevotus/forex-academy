<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MemberController extends Controller
{
    public function index(Request $request): View
    {
        $query = User::where('role', 'member')->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('q')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', "%{$request->q}%")
                    ->orWhere('email', 'like', "%{$request->q}%");
            });
        }

        $members = $query->paginate(15)->withQueryString();

        return view('admin.members.index', compact('members'));
    }

    public function show(User $member): View
    {
        $member->load(['payments', 'unlocks', 'robotSubscriptions.robot', 'lessonProgress.lesson']);

        return view('admin.members.show', compact('member'));
    }

    public function approve(User $member): RedirectResponse
    {
        $member->update(['status' => 'approved', 'approved_at' => now()]);

        return back()->with('status', "{$member->name} has been approved.");
    }

    public function suspend(User $member): RedirectResponse
    {
        $member->update(['status' => 'suspended']);

        return back()->with('status', "{$member->name} has been suspended.");
    }
}
