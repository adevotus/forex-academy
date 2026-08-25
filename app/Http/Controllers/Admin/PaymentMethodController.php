<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PaymentMethodController extends Controller
{
    public function index(): View
    {
        $methods = PaymentMethod::orderBy('order')->orderBy('id')->get();
        return view('admin.payment-methods.index', compact('methods'));
    }

    public function create(): View
    {
        $method = new PaymentMethod;
        return view('admin.payment-methods.form', compact('method'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validated($request);
        PaymentMethod::create($validated);
        return redirect()->route('admin.payment-methods.index')
            ->with('success', 'Payment method added successfully.');
    }

    public function edit(PaymentMethod $paymentMethod): View
    {
        $method = $paymentMethod;
        return view('admin.payment-methods.form', compact('method'));
    }

    public function update(Request $request, PaymentMethod $paymentMethod): RedirectResponse
    {
        $validated = $this->validated($request);
        $paymentMethod->update($validated);
        return redirect()->route('admin.payment-methods.index')
            ->with('success', 'Payment method updated.');
    }

    public function destroy(PaymentMethod $paymentMethod): RedirectResponse
    {
        $paymentMethod->delete();
        return redirect()->route('admin.payment-methods.index')
            ->with('success', 'Payment method deleted.');
    }

    public function toggle(PaymentMethod $paymentMethod): RedirectResponse
    {
        $paymentMethod->update(['is_active' => ! $paymentMethod->is_active]);
        return back()->with('success', $paymentMethod->is_active ? 'Method enabled.' : 'Method disabled.');
    }

    // ── Helpers ──────────────────────────────────────────────────────────────

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'name'       => ['required', 'string', 'max:100'],
            'subtitle'   => ['nullable', 'string', 'max:150'],
            'type'       => ['required', 'in:mobile_money,bank_transfer,crypto,paypal,other'],
            'icon_color' => ['required', 'in:emerald,blue,gold,purple,slate'],
            'note'       => ['nullable', 'string', 'max:500'],
            'is_active'  => ['sometimes', 'boolean'],
            'order'      => ['nullable', 'integer', 'min:0'],
            'details'    => ['nullable', 'array'],
            'details.*.label' => ['required_with:details', 'string', 'max:60'],
            'details.*.value' => ['required_with:details', 'string', 'max:200'],
        ]);

        // Filter out empty rows submitted from JS
        if (isset($data['details'])) {
            $data['details'] = collect($data['details'])
                ->filter(fn($d) => ! empty(trim($d['label'] ?? '')) && ! empty(trim($d['value'] ?? '')))
                ->values()
                ->toArray();
        }

        $data['is_active'] = $request->boolean('is_active');

        return $data;
    }
}
