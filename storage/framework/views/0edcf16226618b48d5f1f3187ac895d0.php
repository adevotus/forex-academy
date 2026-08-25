<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => 'Signals']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Signals']); ?>
     <?php $__env->slot('header', null, []); ?> 
        <div>
            <h1 class="text-2xl font-extrabold text-slate-900">Signals</h1>
            <p class="mt-1 text-sm text-slate-500">Publish trading setups with a short explainer.</p>
        </div>
        <button onclick="openSignalModal()" class="btn-primary !py-2 text-sm flex items-center gap-2">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
            New Signal
        </button>
     <?php $__env->endSlot(); ?>

    <?php if(session('success')): ?>
        <div class="mb-4 flex items-center gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700">
            <svg class="h-4 w-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden">
        <table class="w-full text-left text-sm">
            <thead>
                <tr class="border-b border-slate-200 bg-slate-50 text-xs uppercase tracking-wider text-slate-500">
                    <th class="px-6 py-3">Pair</th>
                    <th class="px-6 py-3">Direction</th>
                    <th class="px-6 py-3">Entry / SL / TP</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3">Published</th>
                    <th class="px-6 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                <?php $__empty_1 = true; $__currentLoopData = $signals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $signal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-slate-50 transition">
                        <td class="px-6 py-4 font-semibold text-slate-900"><?php echo e($signal->pair); ?></td>
                        <td class="px-6 py-4">
                            <?php if($signal->direction === 'buy'): ?>
                                <span class="inline-flex items-center rounded-full border border-emerald-200 bg-emerald-50 px-2.5 py-0.5 text-xs font-bold text-emerald-700">BUY</span>
                            <?php else: ?>
                                <span class="inline-flex items-center rounded-full border border-rose-200 bg-rose-50 px-2.5 py-0.5 text-xs font-bold text-rose-700">SELL</span>
                            <?php endif; ?>
                        </td>
                        <td class="px-6 py-4 font-mono text-xs text-slate-600">
                            <?php echo e($signal->entry_price); ?> / <?php echo e($signal->stop_loss); ?> / <?php echo e($signal->take_profit); ?>

                        </td>
                        <td class="px-6 py-4">
                            <?php
                                $statusMap = [
                                    'active'  => ['bg-blue-50 text-blue-700 border-blue-200', 'Active'],
                                    'hit_tp'  => ['bg-emerald-50 text-emerald-700 border-emerald-200', 'Hit TP'],
                                    'hit_sl'  => ['bg-rose-50 text-rose-700 border-rose-200', 'Hit SL'],
                                    'closed'  => ['bg-slate-100 text-slate-500 border-slate-200', 'Closed'],
                                ];
                                [$cls, $lbl] = $statusMap[$signal->status] ?? ['bg-slate-100 text-slate-500 border-slate-200', ucfirst($signal->status)];
                            ?>
                            <span class="inline-flex rounded-full border px-2.5 py-0.5 text-xs font-semibold <?php echo e($cls); ?>"><?php echo e($lbl); ?></span>
                        </td>
                        <td class="px-6 py-4 text-slate-500 text-xs"><?php echo e($signal->published_at?->format('M d, Y')); ?></td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <button onclick="editSignal(<?php echo e($signal->id); ?>)"
                                    class="rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-xs font-semibold text-slate-700 hover:bg-slate-50 transition shadow-sm">
                                    Edit
                                </button>
                                <form method="POST" action="<?php echo e(route('admin.signals.destroy', $signal)); ?>" onsubmit="return confirm('Delete <?php echo e(addslashes($signal->pair)); ?> signal? This cannot be undone.')">
                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                    <button class="rounded-lg border border-rose-200 bg-rose-50 px-3 py-1.5 text-xs font-semibold text-rose-700 hover:bg-rose-100 transition">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="px-6 py-16 text-center">
                            <svg class="mx-auto h-10 w-10 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"/>
                            </svg>
                            <p class="mt-3 text-sm font-semibold text-slate-500">No signals yet</p>
                            <p class="mt-1 text-xs text-slate-400">Click "New Signal" to publish your first trading setup.</p>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <div class="mt-6"><?php echo e($signals->links()); ?></div>

    
    <div id="signal-modal" class="fixed inset-0 z-50 hidden" style="background:rgba(15,23,42,0.45)">
        <div class="absolute inset-0" onclick="closeSignalModal()"></div>

        <div class="absolute inset-0 flex items-center justify-center p-6 pointer-events-none">
            <div class="pointer-events-auto w-full rounded-2xl bg-white shadow-2xl" style="max-width:580px">

                
                <div class="flex items-center justify-between px-6 pt-5 pb-4 border-b border-slate-100">
                    <div>
                        <p class="text-[11px] font-bold uppercase tracking-widest text-slate-400">Trading Signal</p>
                        <h3 id="modal-title" class="text-lg font-extrabold text-slate-900 mt-0.5">New Signal</h3>
                    </div>
                    <button onclick="closeSignalModal()"
                            class="flex h-8 w-8 items-center justify-center rounded-lg text-slate-400 hover:bg-slate-100 hover:text-slate-700 transition">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                
                <form id="signal-form" method="POST" class="px-6 py-5 space-y-5">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="_method" id="form-method" value="POST">

                    
                    <div class="grid grid-cols-3 gap-3">
                        <div class="col-span-1">
                            <label class="mb-1 block text-xs font-bold uppercase tracking-wide text-slate-500">Pair <span class="text-rose-500">*</span></label>
                            <input type="text" name="pair" id="f-pair" class="input w-full font-mono font-bold" placeholder="EUR/USD" required>
                        </div>
                        <div>
                            <label class="mb-1 block text-xs font-bold uppercase tracking-wide text-slate-500">Direction</label>
                            <select name="direction" id="f-direction" class="input w-full font-bold">
                                <option value="buy">📈 BUY</option>
                                <option value="sell">📉 SELL</option>
                            </select>
                        </div>
                        <div>
                            <label class="mb-1 block text-xs font-bold uppercase tracking-wide text-slate-500">Status</label>
                            <select name="status" id="f-status" class="input w-full">
                                <option value="active">Active</option>
                                <option value="hit_tp">Hit TP ✅</option>
                                <option value="hit_sl">Hit SL ❌</option>
                                <option value="closed">Closed</option>
                            </select>
                        </div>
                    </div>

                    
                    <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
                        <p class="mb-3 text-xs font-bold uppercase tracking-wide text-slate-500">Price Levels</p>
                        <div class="grid grid-cols-3 gap-3">
                            <div>
                                <label class="mb-1 block text-xs font-semibold text-slate-600">Entry Price</label>
                                <input type="number" step="0.00001" name="entry_price" id="f-entry"
                                       class="input w-full font-mono text-sm" placeholder="0.00000">
                            </div>
                            <div>
                                <label class="mb-1 flex items-center gap-1 text-xs font-semibold text-rose-600">
                                    <span class="h-1.5 w-1.5 rounded-full bg-rose-500 inline-block"></span> Stop Loss
                                </label>
                                <input type="number" step="0.00001" name="stop_loss" id="f-sl"
                                       class="input w-full font-mono text-sm border-rose-200 focus:ring-rose-300" placeholder="0.00000">
                            </div>
                            <div>
                                <label class="mb-1 flex items-center gap-1 text-xs font-semibold text-emerald-600">
                                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-500 inline-block"></span> Take Profit
                                </label>
                                <input type="number" step="0.00001" name="take_profit" id="f-tp"
                                       class="input w-full font-mono text-sm border-emerald-200 focus:ring-emerald-300" placeholder="0.00000">
                            </div>
                        </div>
                    </div>

                    
                    <div>
                        <label class="mb-1 block text-xs font-bold uppercase tracking-wide text-slate-500">Analysis / Explainer</label>
                        <textarea name="explainer" id="f-explainer" rows="3"
                                  class="input w-full resize-none text-sm"
                                  placeholder="Why this setup was chosen — key levels, confluence, bias…"></textarea>
                    </div>

                    
                    <div class="flex items-center justify-between pt-1 border-t border-slate-100">
                        <p class="text-xs text-slate-400">All fields saved immediately on submit.</p>
                        <div class="flex items-center gap-2">
                            <button type="button" onclick="closeSignalModal()"
                                    class="rounded-xl border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-600 hover:bg-slate-50 transition">
                                Cancel
                            </button>
                            <button type="submit" id="modal-submit" class="btn-primary px-6">
                                Publish Signal
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    <script id="signals-data" type="application/json"><?php echo json_encode($signals->items(), 15, 512) ?></script>

    <script>
    const storeUrl = "<?php echo e(route('admin.signals.store')); ?>";

    const signalsMap = {};
    JSON.parse(document.getElementById('signals-data').textContent)
        .forEach(function(s) { signalsMap[s.id] = s; });

    function openSignalModal() {
        document.getElementById('modal-title').textContent = 'New Signal';
        document.getElementById('modal-submit').textContent = 'Publish Signal';
        document.getElementById('signal-form').action = storeUrl;
        document.getElementById('form-method').value = 'POST';
        document.getElementById('f-pair').value = '';
        document.getElementById('f-direction').value = 'buy';
        document.getElementById('f-entry').value = '';
        document.getElementById('f-sl').value = '';
        document.getElementById('f-tp').value = '';
        document.getElementById('f-explainer').value = '';
        document.getElementById('f-status').value = 'active';
        document.getElementById('signal-modal').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function editSignal(id) {
        const signal = signalsMap[id];
        if (!signal) return;
        document.getElementById('modal-title').textContent = 'Edit Signal';
        document.getElementById('modal-submit').textContent = 'Save Changes';
        document.getElementById('signal-form').action = `/admin/signals/${signal.id}`;
        document.getElementById('form-method').value = 'PUT';
        document.getElementById('f-pair').value = signal.pair || '';
        document.getElementById('f-direction').value = signal.direction || 'buy';
        document.getElementById('f-entry').value = signal.entry_price || '';
        document.getElementById('f-sl').value = signal.stop_loss || '';
        document.getElementById('f-tp').value = signal.take_profit || '';
        document.getElementById('f-explainer').value = signal.explainer || '';
        document.getElementById('f-status').value = signal.status || 'active';
        document.getElementById('signal-modal').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeSignalModal() {
        document.getElementById('signal-modal').classList.add('hidden');
        document.body.style.overflow = '';
    }

    document.addEventListener('keydown', e => { if (e.key === 'Escape') closeSignalModal(); });
    </script>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3)): ?>
<?php $attributes = $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3; ?>
<?php unset($__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc8c9fd5d7827a77a31381de67195f0c3)): ?>
<?php $component = $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3; ?>
<?php unset($__componentOriginalc8c9fd5d7827a77a31381de67195f0c3); ?>
<?php endif; ?>
<?php /**PATH D:\projects\emmiox-academy\emmiox-academy\resources\views/admin/signals/index.blade.php ENDPATH**/ ?>