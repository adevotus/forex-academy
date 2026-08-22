<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PreferencesController extends Controller
{
    public function index(): View
    {
        $prefs = auth()->user()->preferences ?? [];
        return view('admin.preferences', ['prefs' => $prefs]);
    }

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'currency'              => ['required', 'in:USD,TZS'],
            'notify_new_member'     => ['nullable', 'boolean'],
            'notify_new_payment'    => ['nullable', 'boolean'],
            'notify_payment_failed' => ['nullable', 'boolean'],
            'sidebar_collapsed'     => ['nullable', 'boolean'],
        ]);

        $prefs = [
            'currency'              => $validated['currency'],
            'notify_new_member'     => (bool) ($request->notify_new_member ?? false),
            'notify_new_payment'    => (bool) ($request->notify_new_payment ?? false),
            'notify_payment_failed' => (bool) ($request->notify_payment_failed ?? false),
            'sidebar_collapsed'     => (bool) ($request->sidebar_collapsed ?? false),
        ];

        auth()->user()->update(['preferences' => $prefs]);

        return back()->with('success', 'Preferences saved.');
    }
}
