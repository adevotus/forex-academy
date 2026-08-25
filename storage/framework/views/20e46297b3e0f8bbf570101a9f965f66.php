<?php if (isset($component)) { $__componentOriginalc8c9fd5d7827a77a31381de67195f0c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc8c9fd5d7827a77a31381de67195f0c3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.admin','data' => ['title' => ''.e($member->name).' — Member Profile']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.admin'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => ''.e($member->name).' — Member Profile']); ?>
<?php
    $currency       = \App\Models\Setting::get('currency', 'USD');
    $currencySymbol = $currency === 'TZS' ? 'TZS ' : '$';
?>

    
    <div class="flex flex-col gap-6 sm:flex-row sm:items-start sm:justify-between mb-8">

        
        <div class="flex items-center gap-5">
            <div class="w-16 h-16 rounded-2xl bg-brand-100 ring-2 ring-brand-200 flex items-center justify-center flex-shrink-0">
                <span class="text-2xl font-extrabold text-brand-600">
                    <?php echo e(strtoupper(substr($member->name, 0, 1))); ?><?php echo e(strtoupper(substr(strstr($member->name, ' ') ?: ' ', 1, 1))); ?>

                </span>
            </div>
            <div>
                <h1 class="text-2xl font-extrabold text-slate-900 leading-tight"><?php echo e($member->name); ?></h1>
                <p class="text-sm text-slate-500 mt-0.5"><?php echo e($member->email); ?></p>
                <div class="mt-2 flex items-center gap-2 flex-wrap">
                    <?php if($member->status === 'approved'): ?>
                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-50 border border-emerald-200 text-emerald-700">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 inline-block"></span> Approved
                        </span>
                    <?php elseif($member->status === 'pending'): ?>
                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-amber-50 border border-amber-200 text-amber-700">
                            <span class="w-1.5 h-1.5 rounded-full bg-amber-500 inline-block"></span> Pending
                        </span>
                    <?php else: ?>
                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-rose-50 border border-rose-200 text-rose-700">
                            <span class="w-1.5 h-1.5 rounded-full bg-rose-500 inline-block"></span> Suspended
                        </span>
                    <?php endif; ?>
                    <?php if($member->country): ?>
                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-600">
                            <?php echo e($member->country); ?>

                        </span>
                    <?php endif; ?>
                    <span class="text-xs text-slate-400">Joined <?php echo e($member->created_at->format('M j, Y')); ?></span>
                </div>
            </div>
        </div>

        
        <div class="flex items-center gap-2 flex-shrink-0">
            <?php if($member->status !== 'approved'): ?>
                <form method="POST" action="<?php echo e(route('admin.members.approve', $member)); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg text-sm font-semibold bg-emerald-600 hover:bg-emerald-700 text-white transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        Approve
                    </button>
                </form>
            <?php endif; ?>
            <?php if($member->status !== 'suspended'): ?>
                <form method="POST" action="<?php echo e(route('admin.members.suspend', $member)); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg text-sm font-semibold border border-rose-200 bg-rose-50 hover:bg-rose-100 text-rose-700 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/></svg>
                        Suspend
                    </button>
                </form>
            <?php endif; ?>
            <a href="<?php echo e(route('admin.members.index')); ?>" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg text-sm font-medium border border-slate-200 bg-white hover:bg-slate-50 text-slate-700 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Back
            </a>
        </div>
    </div>

    
    <?php if(session('status')): ?>
        <div class="mb-6 flex items-center gap-3 px-4 py-3 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-700 text-sm font-medium">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>

    
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4 mb-8">
        <?php
        $statCards = [
            ['label' => 'Total Payments',    'value' => $stats['total_payments'],    'color' => 'brand'],
            ['label' => 'Approved',          'value' => $stats['approved_payments'], 'color' => 'emerald'],
            ['label' => 'Total Spent',       'value' => $currencySymbol.number_format($stats['total_spent'],2), 'color' => 'gold'],
            ['label' => 'Lessons Done',      'value' => $stats['lessons_completed'], 'color' => 'violet'],
            ['label' => 'Active Robots',     'value' => $stats['robots_active'],     'color' => 'sky'],
            ['label' => 'Login Sessions',    'value' => $stats['sessions_count'],    'color' => 'slate'],
        ];
        $colorMap = [
            'brand'   => 'bg-brand-50 ring-brand-100 text-brand-600',
            'emerald' => 'bg-emerald-50 ring-emerald-100 text-emerald-700',
            'gold'    => 'bg-amber-50 ring-amber-100 text-amber-700',
            'violet'  => 'bg-violet-50 ring-violet-100 text-violet-700',
            'sky'     => 'bg-sky-50 ring-sky-100 text-sky-700',
            'slate'   => 'bg-slate-100 ring-slate-200 text-slate-700',
        ];
        ?>
        <?php $__currentLoopData = $statCards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card p-4 flex flex-col gap-1">
                <span class="text-xs font-medium text-slate-500 uppercase tracking-wide"><?php echo e($sc['label']); ?></span>
                <span class="text-xl font-extrabold <?php echo e(explode(' ', $colorMap[$sc['color']])[2]); ?>"><?php echo e($sc['value']); ?></span>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        
        <div class="lg:col-span-1 space-y-6">

            
            <div class="card p-6">
                <h2 class="text-sm font-semibold text-slate-700 uppercase tracking-wide mb-4">Edit Profile</h2>

                <?php if($errors->any()): ?>
                    <div class="mb-4 px-4 py-3 rounded-xl bg-rose-50 border border-rose-200 text-rose-700 text-sm">
                        <ul class="space-y-0.5">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($err); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form method="POST" action="<?php echo e(route('admin.members.update', $member)); ?>">
                    <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-medium text-slate-600 mb-1">Full Name</label>
                            <input type="text" name="name" value="<?php echo e(old('name', $member->name)); ?>"
                                   class="w-full px-3 py-2 rounded-lg border border-slate-200 bg-white text-sm text-slate-900 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-slate-600 mb-1">Email</label>
                            <input type="email" name="email" value="<?php echo e(old('email', $member->email)); ?>"
                                   class="w-full px-3 py-2 rounded-lg border border-slate-200 bg-white text-sm text-slate-900 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-slate-600 mb-1">Phone</label>
                            <input type="text" name="phone" value="<?php echo e(old('phone', $member->phone)); ?>"
                                   class="w-full px-3 py-2 rounded-lg border border-slate-200 bg-white text-sm text-slate-900 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-slate-600 mb-1">Country</label>
                            <input type="text" name="country" value="<?php echo e(old('country', $member->country)); ?>"
                                   class="w-full px-3 py-2 rounded-lg border border-slate-200 bg-white text-sm text-slate-900 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-slate-600 mb-1">Account Status</label>
                            <select name="status" class="w-full px-3 py-2 rounded-lg border border-slate-200 bg-white text-sm text-slate-900 focus:outline-none focus:ring-2 focus:ring-brand-500">
                                <option value="pending"   <?php if(old('status', $member->status) === 'pending'): echo 'selected'; endif; ?>>Pending</option>
                                <option value="approved"  <?php if(old('status', $member->status) === 'approved'): echo 'selected'; endif; ?>>Approved</option>
                                <option value="suspended" <?php if(old('status', $member->status) === 'suspended'): echo 'selected'; endif; ?>>Suspended</option>
                            </select>
                        </div>
                        <button type="submit" class="w-full py-2 rounded-lg bg-brand-600 hover:bg-brand-700 text-white text-sm font-semibold transition-colors">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>

            
            <div class="card p-6">
                <h2 class="text-sm font-semibold text-slate-700 uppercase tracking-wide mb-4">Account Info</h2>
                <dl class="space-y-3 text-sm">
                    <div class="flex justify-between">
                        <dt class="text-slate-500">Reg. Fee Paid</dt>
                        <dd class="font-medium <?php echo e($member->registration_fee_paid ? 'text-emerald-700' : 'text-rose-600'); ?>">
                            <?php echo e($member->registration_fee_paid ? 'Yes' : 'No'); ?>

                        </dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="text-slate-500">Approved At</dt>
                        <dd class="font-medium text-slate-800"><?php echo e($member->approved_at?->format('M j, Y') ?? '—'); ?></dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="text-slate-500">Email Verified</dt>
                        <dd class="font-medium text-slate-800"><?php echo e($member->email_verified_at?->format('M j, Y') ?? 'No'); ?></dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="text-slate-500">Mentorship Bookings</dt>
                        <dd class="font-medium text-slate-800"><?php echo e($member->mentorshipBookings->count()); ?></dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="text-slate-500">Content Unlocks</dt>
                        <dd class="font-medium text-slate-800"><?php echo e($member->unlocks->count()); ?></dd>
                    </div>
                </dl>
            </div>
        </div>

        
        <div class="lg:col-span-2 space-y-6">

            
            <div class="card overflow-hidden">
                <div class="px-5 py-4 border-b border-slate-100 flex items-center justify-between">
                    <h2 class="text-sm font-semibold text-slate-700 uppercase tracking-wide">Payment History</h2>
                    <span class="text-xs text-slate-400"><?php echo e($member->payments->count()); ?> total</span>
                </div>
                <?php if($member->payments->isEmpty()): ?>
                    <div class="px-5 py-8 text-center text-sm text-slate-400">No payments yet.</div>
                <?php else: ?>
                    <div class="divide-y divide-slate-100">
                        <?php $__currentLoopData = $member->payments->sortByDesc('created_at')->take(8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="px-5 py-3 flex items-center justify-between gap-4">
                                <div class="min-w-0">
                                    <p class="text-sm font-medium text-slate-900 truncate"><?php echo e($payment->description ?? 'Payment #'.$payment->id); ?></p>
                                    <p class="text-xs text-slate-400 mt-0.5"><?php echo e($payment->created_at->format('M j, Y')); ?></p>
                                </div>
                                <div class="flex items-center gap-3 flex-shrink-0">
                                    <span class="text-sm font-bold text-slate-800">$<?php echo e(number_format($payment->amount, 2)); ?></span>
                                    <?php if($payment->status === 'approved'): ?>
                                        <span class="px-2 py-0.5 rounded-full text-xs font-semibold bg-emerald-50 border border-emerald-200 text-emerald-700">Approved</span>
                                    <?php elseif($payment->status === 'pending'): ?>
                                        <span class="px-2 py-0.5 rounded-full text-xs font-semibold bg-amber-50 border border-amber-200 text-amber-700">Pending</span>
                                    <?php else: ?>
                                        <span class="px-2 py-0.5 rounded-full text-xs font-semibold bg-rose-50 border border-rose-200 text-rose-700"><?php echo e(ucfirst($payment->status)); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
            </div>

            
            <div class="card overflow-hidden">
                <div class="px-5 py-4 border-b border-slate-100 flex items-center justify-between">
                    <h2 class="text-sm font-semibold text-slate-700 uppercase tracking-wide">Course Progress</h2>
                    <span class="text-xs text-slate-400"><?php echo e($stats['lessons_completed']); ?> lessons completed</span>
                </div>
                <?php if($courseProgress->isEmpty()): ?>
                    <div class="px-5 py-8 text-center text-sm text-slate-400">No lessons completed yet.</div>
                <?php else: ?>
                    <div class="divide-y divide-slate-100">
                        <?php $__currentLoopData = $courseProgress; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $courseName => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="px-5 py-3 flex items-center gap-4">
                                <div class="w-8 h-8 rounded-lg bg-violet-50 border border-violet-100 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-violet-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-slate-900 truncate"><?php echo e($courseName); ?></p>
                                </div>
                                <span class="text-sm font-bold text-violet-700 flex-shrink-0"><?php echo e($count); ?> lesson<?php echo e($count !== 1 ? 's' : ''); ?></span>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
            </div>

            
            <div class="card overflow-hidden">
                <div class="px-5 py-4 border-b border-slate-100 flex items-center justify-between gap-3">
                    <div>
                        <h2 class="text-sm font-semibold text-slate-700 uppercase tracking-wide">Login Sessions</h2>
                        <p class="text-xs text-slate-400 mt-0.5">Max 2 IPs allowed per account</p>
                    </div>
                    <?php if($member->loginSessions->isNotEmpty()): ?>
                        <form method="POST" action="<?php echo e(route('admin.members.sessions.clear', $member)); ?>"
                              onsubmit="return confirm('Clear ALL sessions for this member?')">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold border border-rose-200 bg-rose-50 hover:bg-rose-100 text-rose-700 transition-colors">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                                Clear All
                            </button>
                        </form>
                    <?php endif; ?>
                </div>

                <?php if($member->loginSessions->isEmpty()): ?>
                    <div class="px-5 py-8 text-center">
                        <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center mx-auto mb-3">
                            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <p class="text-sm text-slate-400">No login sessions recorded yet.</p>
                    </div>
                <?php else: ?>
                    <div class="divide-y divide-slate-100">
                        <?php $__currentLoopData = $member->loginSessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="px-5 py-4 flex items-center gap-4">
                                <div class="w-9 h-9 rounded-xl bg-slate-100 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-semibold text-slate-900"><?php echo e($session->device_name ?? 'Unknown device'); ?></p>
                                    <p class="text-xs text-slate-500 font-mono mt-0.5"><?php echo e($session->ip_address); ?></p>
                                    <p class="text-xs text-slate-400 mt-0.5">Last seen <?php echo e($session->last_seen_at?->diffForHumans() ?? 'never'); ?></p>
                                </div>
                                <form method="POST" action="<?php echo e(route('admin.members.sessions.revoke', [$member, $session])); ?>">
                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg text-xs font-semibold border border-slate-200 bg-white hover:bg-rose-50 hover:border-rose-200 hover:text-rose-700 text-slate-600 transition-colors">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                        Revoke
                                    </button>
                                </form>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    
                    <div class="px-5 py-3 border-t border-slate-100 bg-slate-50">
                        <div class="flex items-center gap-3">
                            <div class="flex gap-1.5">
                                <?php for($i = 0; $i < 2; $i++): ?>
                                    <div class="w-3 h-3 rounded-full <?php echo e($i < $member->loginSessions->count() ? 'bg-brand-500' : 'bg-slate-200'); ?>"></div>
                                <?php endfor; ?>
                            </div>
                            <span class="text-xs text-slate-500">
                                <?php echo e($member->loginSessions->count()); ?>/2 IP slots used
                                <?php if($member->loginSessions->count() >= 2): ?>
                                    — <span class="text-rose-600 font-medium">Account locked from new devices</span>
                                <?php endif; ?>
                            </span>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            
            <?php if($member->robotSubscriptions->isNotEmpty()): ?>
                <div class="card overflow-hidden">
                    <div class="px-5 py-4 border-b border-slate-100">
                        <h2 class="text-sm font-semibold text-slate-700 uppercase tracking-wide">Robot Subscriptions</h2>
                    </div>
                    <div class="divide-y divide-slate-100">
                        <?php $__currentLoopData = $member->robotSubscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="px-5 py-3 flex items-center justify-between gap-4">
                                <div class="min-w-0">
                                    <p class="text-sm font-medium text-slate-900 truncate"><?php echo e($sub->robot?->name ?? 'Unknown Robot'); ?></p>
                                    <p class="text-xs text-slate-400 mt-0.5">Since <?php echo e($sub->created_at->format('M j, Y')); ?></p>
                                </div>
                                <?php if($sub->status === 'active'): ?>
                                    <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-50 border border-emerald-200 text-emerald-700">Active</span>
                                <?php else: ?>
                                    <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-slate-100 text-slate-500"><?php echo e(ucfirst($sub->status)); ?></span>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>

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
<?php /**PATH D:\projects\emmiox-academy\emmiox-academy\resources\views\admin\members\show.blade.php ENDPATH**/ ?>