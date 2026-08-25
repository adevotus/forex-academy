<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => isset($method->id) ? 'Edit Payment Method' : 'Add Payment Method']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(isset($method->id) ? 'Edit Payment Method' : 'Add Payment Method')]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <div class="flex items-center gap-3">
            <a href="<?php echo e(route('admin.payment-methods.index')); ?>"
               class="flex items-center gap-1.5 rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-xs font-medium text-slate-600 shadow-sm transition hover:bg-slate-50">
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Back
            </a>
            <div>
                <h1 class="text-xl font-bold text-slate-900"><?php echo e(isset($method->id) ? 'Edit Payment Method' : 'Add Payment Method'); ?></h1>
                <p class="text-sm text-slate-500 mt-0.5">This will appear on the member payment page.</p>
            </div>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="mx-auto max-w-2xl">
        <form method="POST"
              action="<?php echo e(isset($method->id) ? route('admin.payment-methods.update', $method) : route('admin.payment-methods.store')); ?>"
              class="space-y-7">
            <?php echo csrf_field(); ?>
            <?php if(isset($method->id)): ?> <?php echo method_field('PUT'); ?> <?php endif; ?>

            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm space-y-5">
                <h2 class="text-sm font-bold text-slate-800 border-b border-slate-100 pb-3">Basic Info</h2>

                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                    
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Method Name <span class="text-rose-500">*</span></label>
                        <input type="text" name="name" value="<?php echo e(old('name', $method->name)); ?>" required
                               placeholder="e.g. M-Pesa"
                               class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm shadow-sm focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-500/20 <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-rose-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-xs text-rose-600"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Subtitle</label>
                        <input type="text" name="subtitle" value="<?php echo e(old('subtitle', $method->subtitle)); ?>"
                               placeholder="e.g. Mobile Money Transfer"
                               class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm shadow-sm focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-500/20">
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-5 sm:grid-cols-3">
                    
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Type <span class="text-rose-500">*</span></label>
                        <select name="type" class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm shadow-sm focus:border-brand-500 focus:outline-none">
                            <?php $__currentLoopData = ['mobile_money' => 'Mobile Money','bank_transfer' => 'Bank Transfer','crypto' => 'Cryptocurrency','paypal' => 'PayPal','other' => 'Other']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($val); ?>" <?php echo e(old('type', $method->type) === $val ? 'selected' : ''); ?>><?php echo e($label); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Icon Colour <span class="text-rose-500">*</span></label>
                        <select name="icon_color" class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm shadow-sm focus:border-brand-500 focus:outline-none">
                            <?php $__currentLoopData = ['emerald' => 'Green (Emerald)','blue' => 'Blue','gold' => 'Gold / Yellow','purple' => 'Purple','slate' => 'Grey']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($val); ?>" <?php echo e(old('icon_color', $method->icon_color ?? 'emerald') === $val ? 'selected' : ''); ?>><?php echo e($label); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1.5">Display Order</label>
                        <input type="number" name="order" min="0" value="<?php echo e(old('order', $method->order ?? 0)); ?>"
                               class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm shadow-sm focus:border-brand-500 focus:outline-none">
                    </div>
                </div>

                
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1.5">Note <span class="text-slate-400 font-normal text-xs">(shown below the payment card)</span></label>
                    <textarea name="note" rows="2" placeholder="e.g. Use your email address as payment reference so we can match your payment quickly."
                              class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm shadow-sm focus:border-brand-500 focus:outline-none resize-none"><?php echo e(old('note', $method->note)); ?></textarea>
                </div>

                
                <label class="flex cursor-pointer items-center gap-3">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" <?php echo e(old('is_active', $method->is_active ?? true) ? 'checked' : ''); ?>

                           class="h-4 w-4 rounded border-slate-300 text-brand-600 focus:ring-brand-500">
                    <span class="text-sm font-medium text-slate-700">Active (visible to members)</span>
                </label>
            </div>

            
            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h2 class="text-sm font-bold text-slate-800">Payment Details</h2>
                        <p class="text-xs text-slate-500 mt-0.5">Add fields like Phone, Account No., Name, Branch etc.</p>
                    </div>
                    <button type="button" id="add-detail-row"
                            class="flex items-center gap-1.5 rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-xs font-medium text-slate-700 shadow-sm transition hover:bg-slate-50">
                        <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                        Add Field
                    </button>
                </div>

                <div id="details-container" class="space-y-3">
                    <?php $existingDetails = old('details', $method->details ?? []); ?>
                    <?php $__empty_1 = true; $__currentLoopData = $existingDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="detail-row flex items-center gap-3">
                            <input type="text" name="details[<?php echo e($i); ?>][label]" value="<?php echo e($detail['label'] ?? ''); ?>"
                                   placeholder="Label (e.g. Phone)"
                                   class="flex-1 rounded-xl border border-slate-300 px-4 py-2.5 text-sm shadow-sm focus:border-brand-500 focus:outline-none">
                            <input type="text" name="details[<?php echo e($i); ?>][value]" value="<?php echo e($detail['value'] ?? ''); ?>"
                                   placeholder="Value (e.g. +255 712 345 678)"
                                   class="flex-[2] rounded-xl border border-slate-300 px-4 py-2.5 text-sm shadow-sm focus:border-brand-500 focus:outline-none">
                            <button type="button" onclick="this.closest('.detail-row').remove()"
                                    class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg border border-rose-200 bg-rose-50 text-rose-500 transition hover:bg-rose-100">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                            </button>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        
                    <?php endif; ?>
                </div>
            </div>

            <div class="flex justify-end gap-3">
                <a href="<?php echo e(route('admin.payment-methods.index')); ?>" class="btn-outline">Cancel</a>
                <button type="submit" class="btn-primary">
                    <?php echo e(isset($method->id) ? 'Save Changes' : 'Create Method'); ?>

                </button>
            </div>
        </form>
    </div>

    <script>
    (function () {
        let rowIndex = <?php echo e(count(old('details', $method->details ?? []))); ?>;

        document.getElementById('add-detail-row').addEventListener('click', function () {
            const container = document.getElementById('details-container');
            const row = document.createElement('div');
            row.className = 'detail-row flex items-center gap-3';
            row.innerHTML = `
                <input type="text" name="details[${rowIndex}][label]" placeholder="Label (e.g. Phone)"
                       class="flex-1 rounded-xl border border-slate-300 px-4 py-2.5 text-sm shadow-sm focus:border-brand-500 focus:outline-none">
                <input type="text" name="details[${rowIndex}][value]" placeholder="Value (e.g. +255 712 345 678)"
                       class="flex-[2] rounded-xl border border-slate-300 px-4 py-2.5 text-sm shadow-sm focus:border-brand-500 focus:outline-none">
                <button type="button" onclick="this.closest('.detail-row').remove()"
                        class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-lg border border-rose-200 bg-rose-50 text-rose-500 transition hover:bg-rose-100">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            `;
            container.appendChild(row);
            rowIndex++;
        });
    })();
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
<?php /**PATH D:\projects\emmiox-academy\emmiox-academy\resources\views/admin/payment-methods/form.blade.php ENDPATH**/ ?>