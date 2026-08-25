<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => 'Members']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Members']); ?>
     <?php $__env->slot('header', null, []); ?> 
        <div>
            <h1 class="text-2xl font-extrabold text-slate-900">Members</h1>
            <p class="mt-1 text-sm text-slate-500">Approve registrations and manage member access.</p>
        </div>
        <form method="GET" class="flex gap-2">
            <input type="text" name="q" value="<?php echo e(request('q')); ?>"
                   placeholder="Search name or email"
                   class="input !py-2 !text-sm">
            <select name="status" class="input !py-2 !text-sm !w-auto">
                <option value="">All statuses</option>
                <option value="pending"   <?php if(request('status')==='pending'): echo 'selected'; endif; ?>>Pending</option>
                <option value="approved"  <?php if(request('status')==='approved'): echo 'selected'; endif; ?>>Approved</option>
                <option value="suspended" <?php if(request('status')==='suspended'): echo 'selected'; endif; ?>>Suspended</option>
            </select>
            <button class="btn-outline !py-2 !text-sm">Filter</button>
        </form>
     <?php $__env->endSlot(); ?>

    <div class="card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="border-b border-slate-100 bg-slate-50 text-xs font-semibold uppercase tracking-wider text-slate-500">
                        <th class="px-6 py-3">Member</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3">Joined</th>
                        <th class="px-6 py-3 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php $__empty_1 = true; $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-full bg-brand-50 text-sm font-bold text-brand-600">
                                        <?php echo e(strtoupper(substr($member->name, 0, 1))); ?>

                                    </div>
                                    <a href="<?php echo e(route('admin.members.show', $member)); ?>"
                                       class="font-semibold text-slate-900 hover:text-brand-600"><?php echo e($member->name); ?></a>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-slate-500"><?php echo e($member->email); ?></td>
                            <td class="px-6 py-4">
                                <span class="badge <?php echo e(match($member->status) {
                                    'approved'  => 'border-emerald-200 bg-emerald-50 text-emerald-700',
                                    'suspended' => 'border-rose-200 bg-rose-50 text-rose-700',
                                    default     => 'border-gold-200 bg-gold-50 text-gold-700',
                                }); ?>"><?php echo e(ucfirst($member->status)); ?></span>
                            </td>
                            <td class="px-6 py-4 text-slate-500"><?php echo e($member->created_at->format('M d, Y')); ?></td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="<?php echo e(route('admin.members.show', $member)); ?>"
                                       class="rounded-lg border border-slate-200 px-3 py-1.5 text-xs font-medium text-slate-600 hover:bg-slate-50">View</a>
                                    <?php if($member->status !== 'approved'): ?>
                                        <form method="POST" action="<?php echo e(route('admin.members.approve', $member)); ?>">
                                            <?php echo csrf_field(); ?>
                                            <button class="rounded-lg border border-emerald-200 bg-emerald-50 px-3 py-1.5 text-xs font-medium text-emerald-700 hover:bg-emerald-100">Approve</button>
                                        </form>
                                    <?php endif; ?>
                                    <?php if($member->status !== 'suspended'): ?>
                                        <form method="POST" action="<?php echo e(route('admin.members.suspend', $member)); ?>">
                                            <?php echo csrf_field(); ?>
                                            <button class="rounded-lg border border-rose-200 bg-rose-50 px-3 py-1.5 text-xs font-medium text-rose-700 hover:bg-rose-100">Suspend</button>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center gap-2">
                                    <svg class="h-10 w-10 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                    <p class="text-sm text-slate-400">No members found.</p>
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-6"><?php echo e($members->links()); ?></div>
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
<?php /**PATH D:\projects\emmiox-academy\emmiox-academy\resources\views\admin\members\index.blade.php ENDPATH**/ ?>