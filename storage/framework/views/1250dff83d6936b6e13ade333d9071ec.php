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
            <h1 class="text-2xl font-bold text-white">Members</h1>
            <p class="mt-1 text-sm text-slate-400">Approve registrations and manage member access.</p>
        </div>
        <form method="GET" class="flex gap-2">
            <input type="text" name="q" value="<?php echo e(request('q')); ?>" placeholder="Search name or email" class="input !py-2 !text-sm">
            <select name="status" class="input !py-2 !text-sm !w-auto">
                <option value="">All statuses</option>
                <option value="pending" <?php if(request('status')==='pending'): echo 'selected'; endif; ?>>Pending</option>
                <option value="approved" <?php if(request('status')==='approved'): echo 'selected'; endif; ?>>Approved</option>
                <option value="suspended" <?php if(request('status')==='suspended'): echo 'selected'; endif; ?>>Suspended</option>
            </select>
            <button class="btn-outline !py-2 !text-sm">Filter</button>
        </form>
     <?php $__env->endSlot(); ?>

    <div class="card overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead>
                <tr class="border-b border-white/10 text-xs uppercase tracking-wider text-slate-500">
                    <th class="px-6 py-3">Name</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3">Joined</th>
                    <th class="px-6 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                <?php $__empty_1 = true; $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="px-6 py-4">
                            <a href="<?php echo e(route('admin.members.show', $member)); ?>" class="font-medium text-white hover:text-brand-300"><?php echo e($member->name); ?></a>
                        </td>
                        <td class="px-6 py-4 text-slate-400"><?php echo e($member->email); ?></td>
                        <td class="px-6 py-4">
                            <span class="badge <?php echo e(match($member->status) {
                                'approved' => 'border-emerald-400/30 bg-emerald-400/10 text-emerald-300',
                                'suspended' => 'border-rose-400/30 bg-rose-400/10 text-rose-300',
                                default => 'border-gold-400/30 bg-gold-400/10 text-gold-300',
                            }); ?>"><?php echo e(ucfirst($member->status)); ?></span>
                        </td>
                        <td class="px-6 py-4 text-slate-500"><?php echo e($member->created_at->format('M d, Y')); ?></td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <?php if($member->status !== 'approved'): ?>
                                    <form method="POST" action="<?php echo e(route('admin.members.approve', $member)); ?>">
                                        <?php echo csrf_field(); ?>
                                        <button class="rounded-lg border border-emerald-400/30 bg-emerald-400/10 px-3 py-1.5 text-xs font-medium text-emerald-300 hover:bg-emerald-400/20">Approve</button>
                                    </form>
                                <?php endif; ?>
                                <?php if($member->status !== 'suspended'): ?>
                                    <form method="POST" action="<?php echo e(route('admin.members.suspend', $member)); ?>">
                                        <?php echo csrf_field(); ?>
                                        <button class="rounded-lg border border-rose-400/30 bg-rose-400/10 px-3 py-1.5 text-xs font-medium text-rose-300 hover:bg-rose-400/20">Suspend</button>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="5" class="px-6 py-8 text-center text-slate-500">No members found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
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
<?php /**PATH D:\projects\emmiox-academy\emmiox-academy\resources\views/admin/members/index.blade.php ENDPATH**/ ?>