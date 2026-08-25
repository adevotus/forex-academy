<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => 'Contact Messages']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Contact Messages']); ?>
     <?php $__env->slot('header', null, []); ?> 
        <div>
            <h1 class="text-xl font-bold text-slate-900">Contact Messages</h1>
            <p class="text-sm text-slate-500 mt-0.5">Messages submitted through the public contact form.</p>
        </div>
        <?php if($unreadCount > 0): ?>
            <span class="rounded-full bg-brand-600 px-3 py-1 text-xs font-bold text-white"><?php echo e($unreadCount); ?> new</span>
        <?php endif; ?>
     <?php $__env->endSlot(); ?>

    <?php if($messages->isEmpty()): ?>
        <div class="flex flex-col items-center gap-3 py-24 text-center">
            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100">
                <svg class="h-7 w-7 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
            </div>
            <p class="text-sm font-semibold text-slate-700">No messages yet</p>
            <p class="text-xs text-slate-400">Messages submitted through the Contact Us page will appear here.</p>
        </div>
    <?php else: ?>
        <div class="rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-100 bg-slate-50/70">
                        <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Sender</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Subject</th>
                        <th class="hidden px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500 sm:table-cell">Date</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">Status</th>
                        <th class="px-5 py-3 text-right text-xs font-semibold uppercase tracking-wider text-slate-500">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="transition hover:bg-slate-50/60 <?php echo e($msg->isNew() ? 'bg-brand-50/30' : ''); ?>">
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-3">
                                    <?php if($msg->isNew()): ?>
                                        <span class="h-2 w-2 flex-shrink-0 rounded-full bg-brand-600 mt-0.5"></span>
                                    <?php else: ?>
                                        <span class="h-2 w-2 flex-shrink-0"></span>
                                    <?php endif; ?>
                                    <div>
                                        <p class="font-semibold text-slate-900 <?php echo e($msg->isNew() ? '' : 'font-medium'); ?>"><?php echo e($msg->name); ?></p>
                                        <p class="text-xs text-slate-400"><?php echo e($msg->email); ?></p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-4">
                                <p class="max-w-[200px] truncate text-slate-700"><?php echo e($msg->subject); ?></p>
                            </td>
                            <td class="hidden px-5 py-4 text-slate-500 sm:table-cell">
                                <p><?php echo e($msg->created_at->format('M j, Y')); ?></p>
                                <p class="text-xs text-slate-400"><?php echo e($msg->created_at->diffForHumans()); ?></p>
                            </td>
                            <td class="px-5 py-4">
                                <?php if($msg->status === 'new'): ?>
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-brand-100 px-2.5 py-1 text-xs font-semibold text-brand-700">
                                        <span class="h-1.5 w-1.5 rounded-full bg-brand-500"></span>
                                        New
                                    </span>
                                <?php elseif($msg->status === 'read'): ?>
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-slate-100 px-2.5 py-1 text-xs font-semibold text-slate-500">
                                        Read
                                    </span>
                                <?php else: ?>
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-semibold text-emerald-700">
                                        Replied
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td class="px-5 py-4 text-right">
                                <a href="<?php echo e(route('admin.contact.show', $msg)); ?>"
                                   class="inline-flex items-center gap-1.5 rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-xs font-medium text-slate-700 shadow-sm transition hover:bg-slate-50 hover:text-brand-700">
                                    <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    View
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

        <?php if($messages->hasPages()): ?>
            <div class="mt-6"><?php echo e($messages->links()); ?></div>
        <?php endif; ?>
    <?php endif; ?>
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
<?php /**PATH D:\projects\emmiox-academy\emmiox-academy\resources\views\admin\contact\index.blade.php ENDPATH**/ ?>