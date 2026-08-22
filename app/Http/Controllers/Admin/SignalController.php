<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Signal;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SignalController extends Controller
{
    public function index(): View
    {
        $signals = Signal::latest('published_at')->paginate(15);

        return view('admin.signals.index', compact('signals'));
    }

    public function create(): View
    {
        return view('admin.signals.form', ['signal' => new Signal]);
    }

    public function store(Request $request): RedirectResponse
    {
        Signal::create($this->validated($request) + ['published_at' => now()]);

        return redirect()->route('admin.signals.index')->with('status', 'Signal published.');
    }

    public function edit(Signal $signal): View
    {
        return view('admin.signals.form', compact('signal'));
    }

    public function update(Request $request, Signal $signal): RedirectResponse
    {
        $signal->update($this->validated($request));

        return redirect()->route('admin.signals.index')->with('status', 'Signal updated.');
    }

    public function destroy(Signal $signal): RedirectResponse
    {
        $signal->delete();

        return back()->with('status', 'Signal removed.');
    }

    protected function validated(Request $request): array
    {
        return $request->validate([
            'pair' => ['required', 'string', 'max:20'],
            'direction' => ['required', 'in:buy,sell'],
            'entry_price' => ['nullable', 'numeric'],
            'stop_loss' => ['nullable', 'numeric'],
            'take_profit' => ['nullable', 'numeric'],
            'explainer' => ['nullable', 'string'],
            'status' => ['required', 'in:active,hit_tp,hit_sl,closed'],
        ]);
    }
}
