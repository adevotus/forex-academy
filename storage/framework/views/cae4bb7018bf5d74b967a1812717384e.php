<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => 'Mentorship Packages']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Mentorship Packages']); ?>
     <?php $__env->slot('header', null, []); ?> 
        <div>
            <h1 class="text-2xl font-extrabold text-slate-900">Mentorship Packages</h1>
            <p class="mt-1 text-sm text-slate-500">Manage group and 1-on-1 mentorship offerings.</p>
        </div>
        <button onclick="openMentorModal()" class="btn-primary !py-2 text-sm flex items-center gap-2">
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
            New Package
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
                    <th class="px-6 py-3">Title</th>
                    <th class="px-6 py-3">Type</th>
                    <th class="px-6 py-3">Price</th>
                    <th class="px-6 py-3">Bookings</th>
                    <th class="px-6 py-3">Status</th>
                    <th class="px-6 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                <?php $__empty_1 = true; $__currentLoopData = $sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-slate-50 transition">
                        <td class="px-6 py-4">
                            <p class="font-semibold text-slate-900"><?php echo e($session->title); ?></p>
                            <?php if($session->mentor_name): ?>
                                <p class="text-xs text-slate-400 mt-0.5">by <?php echo e($session->mentor_name); ?></p>
                            <?php endif; ?>
                        </td>
                        <td class="px-6 py-4">
                            <?php if($session->type === 'one_on_one'): ?>
                                <span class="inline-flex rounded-full border border-purple-200 bg-purple-50 px-2.5 py-0.5 text-xs font-semibold text-purple-700">1-on-1</span>
                            <?php else: ?>
                                <span class="inline-flex rounded-full border border-blue-200 bg-blue-50 px-2.5 py-0.5 text-xs font-semibold text-blue-700">Group</span>
                            <?php endif; ?>
                        </td>
                        <td class="px-6 py-4 font-semibold text-slate-900"><?php echo e($session->priceFormatted()); ?></td>
                        <td class="px-6 py-4 text-slate-600"><?php echo e($session->bookings_count ?? 0); ?></td>
                        <td class="px-6 py-4">
                            <?php if($session->published): ?>
                                <span class="inline-flex items-center gap-1 rounded-full border border-emerald-200 bg-emerald-50 px-2.5 py-0.5 text-xs font-semibold text-emerald-700">
                                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span> Live
                                </span>
                            <?php else: ?>
                                <span class="inline-flex items-center gap-1 rounded-full border border-slate-200 bg-slate-100 px-2.5 py-0.5 text-xs font-semibold text-slate-500">
                                    <span class="h-1.5 w-1.5 rounded-full bg-slate-400"></span> Draft
                                </span>
                            <?php endif; ?>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <button onclick="editMentor(<?php echo json_encode($session, 15, 512) ?>)"
                                    class="rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-xs font-semibold text-slate-700 hover:bg-slate-50 transition shadow-sm">
                                    Edit
                                </button>
                                <form method="POST" action="<?php echo e(route('admin.mentorship.destroy', $session)); ?>" onsubmit="return confirm('Delete <?php echo e(addslashes($session->title)); ?>?')">
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
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <p class="mt-3 text-sm font-semibold text-slate-500">No packages yet</p>
                            <p class="mt-1 text-xs text-slate-400">Click "New Package" to add your first mentorship offering.</p>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>


    
    <div id="mentor-modal" class="fixed inset-0 z-50 hidden" style="background:rgba(15,23,42,0.45)">
        <div class="absolute inset-0" onclick="closeMentorModal()"></div>

        <div class="absolute inset-0 flex items-center justify-center p-6 pointer-events-none">
            <div class="pointer-events-auto w-full rounded-2xl bg-white shadow-2xl" style="max-width:480px">

                
                <div class="flex items-center justify-between px-6 pt-5 pb-4 border-b border-slate-100">
                    <div>
                        <p class="text-[11px] font-bold uppercase tracking-widest text-slate-400">Mentorship</p>
                        <h3 id="mentor-modal-title" class="text-lg font-extrabold text-slate-900 mt-0.5">New Package</h3>
                    </div>
                    <button onclick="closeMentorModal()"
                            class="flex h-8 w-8 items-center justify-center rounded-lg text-slate-400 hover:bg-slate-100 hover:text-slate-700 transition">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                
                <form id="mentor-form" method="POST" class="px-6 py-5 space-y-4">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="_method" id="mentor-method" value="POST">

                    
                    <div>
                        <label class="mb-1 block text-sm font-semibold text-slate-700">
                            Package Title <span class="text-rose-500">*</span>
                        </label>
                        <input type="text" name="title" id="m-title" class="input w-full"
                               placeholder="e.g. Elite Mentorship Programme" required>
                    </div>

                    
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="mb-1 block text-sm font-semibold text-slate-700">Session Type</label>
                            <select name="type" id="m-type" class="input w-full">
                                <option value="group">Group</option>
                                <option value="one_on_one">1-on-1</option>
                            </select>
                        </div>
                        <div>
                            <label class="mb-1 block text-sm font-semibold text-slate-700">
                                Price (USD) <span class="text-rose-500">*</span>
                            </label>
                            <div class="flex overflow-hidden rounded-xl border border-slate-300 bg-white focus-within:border-brand-400 focus-within:ring-2 focus-within:ring-brand-100 transition">
                                <span class="flex items-center border-r border-slate-200 bg-slate-50 px-3 text-sm font-semibold text-slate-400">$</span>
                                <input type="number" step="0.01" min="0" name="price" id="m-price"
                                       class="flex-1 bg-transparent px-3 py-2.5 text-sm font-semibold text-slate-900 outline-none"
                                       placeholder="0.00" required>
                            </div>
                        </div>
                    </div>

                    
                    <div>
                        <label class="mb-1 block text-sm font-semibold text-slate-700">Mentor Name</label>
                        <input type="text" name="mentor_name" id="m-mentor" class="input w-full"
                               placeholder="e.g. John Doe">
                    </div>

                    
                    <div>
                        <label class="mb-1 block text-sm font-semibold text-slate-700">Description</label>
                        <textarea name="description" id="m-desc" rows="2"
                                  class="input w-full resize-none"
                                  placeholder="What members get from this package…"></textarea>
                    </div>

                    
                    <div class="flex items-center justify-between pt-1 border-t border-slate-100">
                        <label class="flex cursor-pointer select-none items-center gap-2">
                            <input type="checkbox" name="published" id="m-published" value="1" checked
                                   class="h-4 w-4 rounded border-slate-300 text-brand-600">
                            <span class="text-sm font-semibold text-slate-700">Published</span>
                        </label>
                        <div class="flex items-center gap-2">
                            <button type="button" onclick="closeMentorModal()"
                                    class="rounded-xl border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-600 hover:bg-slate-50 transition">
                                Cancel
                            </button>
                            <button type="submit" id="mentor-submit" class="btn-primary px-5">
                                Create Package
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

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

<script>
const mentorStoreUrl = "<?php echo e(route('admin.mentorship.store')); ?>";

function openMentorModal() {
    document.getElementById('mentor-modal-title').textContent = 'New Package';
    document.getElementById('mentor-submit').textContent = 'Create Package';
    document.getElementById('mentor-form').action = mentorStoreUrl;
    document.getElementById('mentor-method').value = 'POST';
    document.getElementById('m-title').value = '';
    document.getElementById('m-type').value = 'group';
    document.getElementById('m-price').value = '';
    document.getElementById('m-mentor').value = '';
    document.getElementById('m-desc').value = '';
    document.getElementById('m-published').checked = true;
    document.getElementById('mentor-modal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function editMentor(s) {
    document.getElementById('mentor-modal-title').textContent = 'Edit Package';
    document.getElementById('mentor-submit').textContent = 'Save Changes';
    document.getElementById('mentor-form').action = `/admin/mentorship/${s.id}`;
    document.getElementById('mentor-method').value = 'PUT';
    document.getElementById('m-title').value = s.title ?? '';
    document.getElementById('m-type').value = s.type ?? 'group';
    document.getElementById('m-price').value = s.price ?? '';
    document.getElementById('m-mentor').value = s.mentor_name ?? '';
    document.getElementById('m-desc').value = s.description ?? '';
    document.getElementById('m-published').checked = !!s.published;
    document.getElementById('mentor-modal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeMentorModal() {
    document.getElementById('mentor-modal').classList.add('hidden');
    document.body.style.overflow = '';
}

document.addEventListener('keydown', e => { if (e.key === 'Escape') closeMentorModal(); });
</script>
<?php /**PATH D:\projects\emmiox-academy\emmiox-academy\resources\views\admin\mentorship\index.blade.php ENDPATH**/ ?>