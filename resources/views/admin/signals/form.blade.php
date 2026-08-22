<x-layouts.admin :title="$signal->exists ? 'Edit Signal' : 'New Signal'">
    <x-slot name="header">
        <div>
            <a href="{{ route('admin.signals.index') }}" class="text-xs font-medium text-brand-300 hover:text-brand-200">&larr; Signals</a>
            <h1 class="mt-2 text-2xl font-bold text-white">{{ $signal->exists ? 'Edit Signal' : 'New Signal' }}</h1>
        </div>
    </x-slot>

    <div class="card max-w-2xl p-6">
        <form method="POST" action="{{ $signal->exists ? route('admin.signals.update', $signal) : route('admin.signals.store') }}" class="space-y-4">
            @csrf
            @if ($signal->exists) @method('PUT') @endif

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="label">Pair</label>
                    <input type="text" name="pair" value="{{ old('pair', $signal->pair) }}" class="input" placeholder="EUR/USD" required>
                </div>
                <div>
                    <label class="label">Direction</label>
                    <select name="direction" class="input">
                        <option value="buy" @selected(old('direction', $signal->direction)==='buy')>Buy</option>
                        <option value="sell" @selected(old('direction', $signal->direction)==='sell')>Sell</option>
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="label">Entry Price</label>
                    <input type="number" step="0.00001" name="entry_price" value="{{ old('entry_price', $signal->entry_price) }}" class="input">
                </div>
                <div>
                    <label class="label">Stop Loss</label>
                    <input type="number" step="0.00001" name="stop_loss" value="{{ old('stop_loss', $signal->stop_loss) }}" class="input">
                </div>
                <div>
                    <label class="label">Take Profit</label>
                    <input type="number" step="0.00001" name="take_profit" value="{{ old('take_profit', $signal->take_profit) }}" class="input">
                </div>
            </div>
            <div>
                <label class="label">Explainer — why this setup was chosen</label>
                <textarea name="explainer" rows="4" class="input">{{ old('explainer', $signal->explainer) }}</textarea>
            </div>
            <div>
                <label class="label">Status</label>
                <select name="status" class="input">
                    @foreach (['active'=>'Active','hit_tp'=>'Hit Take Profit','hit_sl'=>'Hit Stop Loss','closed'=>'Closed'] as $val=>$lbl)
                        <option value="{{ $val }}" @selected(old('status', $signal->status)===$val)>{{ $lbl }}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn-primary">{{ $signal->exists ? 'Save Changes' : 'Publish Signal' }}</button>
        </form>
    </div>
</x-layouts.admin>
