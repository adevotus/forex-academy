<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title>Complete Registration — EMMIOXFOREX ACADEMY</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="min-h-full bg-slate-50 antialiased">

<?php
    // Determine the current step based on actual state
    $proofSubmitted   = session('proof_submitted');
    $hasPendingProof  = $existingProof && $existingProof->status === 'pending';
    $hasApprovedProof = $existingProof && $existingProof->status === 'approved';
    // currentStep: 2 = needs to pay, 3 = proof submitted/awaiting approval
    $currentStep = ($proofSubmitted || $hasPendingProof || $hasApprovedProof) ? 3 : 2;
?>


<header class="sticky top-0 z-30 border-b border-slate-200 bg-white/90 backdrop-blur-sm">
    <div class="mx-auto flex h-16 max-w-5xl items-center justify-between px-4 sm:px-6 lg:px-8">
        <?php echo $__env->make('partials.logo', ['dark' => false], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <div class="flex items-center gap-3">
            <span class="hidden text-xs text-slate-400 sm:block"><?php echo e(auth()->user()->email); ?></span>
            <form method="POST" action="<?php echo e(route('logout')); ?>" data-no-loading>
                <?php echo csrf_field(); ?>
                <button type="submit"
                        class="inline-flex items-center gap-1.5 rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-xs font-medium text-slate-600 shadow-sm transition hover:border-slate-300 hover:text-slate-900">
                    <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    Log out
                </button>
            </form>
        </div>
    </div>
</header>

<main class="mx-auto max-w-5xl px-4 py-10 sm:px-6 lg:px-8">

    
    <div class="mb-10 flex items-center justify-center">

        
        <div class="flex items-center gap-2">
            <div class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-full bg-emerald-500 text-white shadow-sm">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            <span class="hidden text-sm font-semibold text-emerald-700 sm:block">Account Created</span>
        </div>

        
        <div class="mx-3 h-px w-10 sm:w-20 <?php echo e($currentStep >= 2 ? 'bg-brand-300' : 'bg-slate-200'); ?>"></div>

        
        <div class="flex items-center gap-2">
            <?php if($currentStep >= 3): ?>
                <div class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-full bg-emerald-500 text-white shadow-sm">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <span class="hidden text-sm font-semibold text-emerald-700 sm:block">Fee Paid</span>
            <?php else: ?>
                <div class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-full bg-brand-600 text-white shadow ring-4 ring-brand-100">
                    <span class="text-xs font-bold">2</span>
                </div>
                <span class="hidden text-sm font-semibold text-brand-700 sm:block">Pay Registration Fee</span>
            <?php endif; ?>
        </div>

        
        <div class="mx-3 h-px w-10 sm:w-20 <?php echo e($currentStep >= 3 ? 'bg-brand-300' : 'bg-slate-200 opacity-40'); ?>"></div>

        
        <div class="flex items-center gap-2 <?php echo e($currentStep >= 3 ? '' : 'opacity-40'); ?>">
            <?php if($currentStep >= 3): ?>
                <div class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-full bg-brand-600 text-white shadow ring-4 ring-brand-100">
                    <span class="text-xs font-bold">3</span>
                </div>
                <span class="hidden text-sm font-semibold text-brand-700 sm:block">Get Approved</span>
            <?php else: ?>
                <div class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-full border-2 border-slate-300 bg-white text-slate-400">
                    <span class="text-xs font-bold">3</span>
                </div>
                <span class="hidden text-sm font-medium text-slate-400 sm:block">Get Approved</span>
            <?php endif; ?>
        </div>

        
        <div class="mx-3 h-px w-10 bg-slate-200 opacity-40 sm:w-20"></div>

        
        <div class="flex items-center gap-2 opacity-40">
            <div class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-full border-2 border-slate-300 bg-white text-slate-400">
                <span class="text-xs font-bold">4</span>
            </div>
            <span class="hidden text-sm font-medium text-slate-400 sm:block">Access Platform</span>
        </div>
    </div>

    
    <?php if($currentStep === 3): ?>
        <div class="mb-6 flex items-start gap-4 rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4">
            <div class="mt-0.5 flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-xl bg-emerald-100">
                <svg class="h-5 w-5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div>
                <p class="font-semibold text-emerald-800">Payment proof received  awaiting admin approval</p>
                <p class="mt-0.5 text-sm text-emerald-700">We've received your proof and it's under review. You'll get full access as soon as it's confirmed  usually within a few hours. You can log out and check back later.</p>
            </div>
        </div>
    <?php endif; ?>

    
    <div class="relative mb-6 overflow-hidden rounded-3xl bg-gradient-to-br from-brand-800 via-brand-700 to-brand-500 p-8 text-white shadow-xl shadow-brand-600/25">
        <div class="pointer-events-none absolute -right-10 -top-10 h-52 w-52 rounded-full bg-white/10 blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-8 right-20 h-36 w-36 rounded-full bg-brand-400/30 blur-2xl"></div>

        <div class="relative flex flex-col gap-6 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-brand-200">One-time Registration Fee</p>
                <div class="mt-2 flex items-baseline gap-3">
                    <span class="text-6xl font-black tracking-tight leading-none"><?php echo e($currencySymbol); ?><?php echo e(number_format($regFee, 0)); ?></span>
                    <span class="text-xl font-semibold text-brand-200"><?php echo e($currency); ?></span>
                </div>
                <p class="mt-3 text-sm text-brand-200">Paid once. Lifetime academy membership.</p>
                <div class="mt-4 flex flex-wrap gap-3">
                    <?php $__currentLoopData = ['Courses', 'Robots', 'Signals', 'Mentorship']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $perk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="inline-flex items-center gap-1 rounded-full bg-white/10 px-3 py-1 text-xs font-medium text-white backdrop-blur-sm">
                            <svg class="h-3 w-3 text-emerald-300" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <?php echo e($perk); ?>

                        </span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="flex flex-row items-center gap-8 sm:flex-col sm:text-right sm:gap-5">
                <div><p class="text-3xl font-black">4</p><p class="mt-0.5 text-xs text-brand-200">Learning Levels</p></div>
                <div><p class="text-3xl font-black">∞</p><p class="mt-0.5 text-xs text-brand-200">Lifetime Access</p></div>
                <div><p class="text-3xl font-black">24/7</p><p class="mt-0.5 text-xs text-brand-200">Support</p></div>
            </div>
        </div>
    </div>

    
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-5">

        
        <div class="lg:col-span-2 space-y-4">
            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                <p class="mb-4 text-[10px] font-bold uppercase tracking-[0.15em] text-slate-400">Payment Details</p>

                
                <div class="mb-3 rounded-2xl border border-emerald-100 bg-emerald-50 p-4">
                    <div class="mb-3 flex items-center gap-3">
                        <div class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-xl bg-emerald-600 text-white text-sm font-extrabold">M</div>
                        <div>
                            <p class="text-sm font-bold text-slate-900">M-Pesa</p>
                            <p class="text-xs text-slate-500">Mobile Money Transfer</p>
                        </div>
                    </div>
                    <div class="space-y-2 rounded-xl bg-white/60 p-3">
                        <div class="flex items-center justify-between gap-2">
                            <span class="text-xs text-slate-500">Phone</span>
                            <span class="select-all font-mono text-sm font-bold text-slate-900">+255 712 345 678</span>
                        </div>
                        <div class="h-px bg-slate-100"></div>
                        <div class="flex items-center justify-between gap-2">
                            <span class="text-xs text-slate-500">Name</span>
                            <span class="text-sm font-semibold text-slate-900">EMMIOXFOREX LTD</span>
                        </div>
                    </div>
                </div>

                
                <div class="rounded-2xl border border-brand-100 bg-brand-50 p-4">
                    <div class="mb-3 flex items-center gap-3">
                        <div class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-xl bg-brand-600 text-white">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-bold text-slate-900">Bank Transfer</p>
                            <p class="text-xs text-slate-500">CRDB Bank Tanzania</p>
                        </div>
                    </div>
                    <div class="space-y-2 rounded-xl bg-white/60 p-3">
                        <div class="flex items-center justify-between gap-2">
                            <span class="text-xs text-slate-500">Account No.</span>
                            <span class="select-all font-mono text-sm font-bold text-slate-900">0150123456789</span>
                        </div>
                        <div class="h-px bg-slate-100"></div>
                        <div class="flex items-center justify-between gap-2">
                            <span class="text-xs text-slate-500">Name</span>
                            <span class="text-sm font-semibold text-slate-900">EMMIOXFOREX LTD</span>
                        </div>
                        <div class="h-px bg-slate-100"></div>
                        <div class="flex items-center justify-between gap-2">
                            <span class="text-xs text-slate-500">Branch</span>
                            <span class="text-sm text-slate-700">Dar es Salaam</span>
                        </div>
                    </div>
                </div>

                
                <div class="mt-4 flex items-start gap-2 rounded-xl border border-amber-100 bg-amber-50 p-3">
                    <svg class="mt-0.5 h-4 w-4 flex-shrink-0 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <p class="text-xs leading-relaxed text-amber-700">
                        Use <strong class="font-bold"><?php echo e(auth()->user()->email); ?></strong> as your payment reference so we can match your payment quickly.
                    </p>
                </div>
            </div>
        </div>

        
        <div class="lg:col-span-3">
            <div class="h-full rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

                <?php if($currentStep === 3): ?>
                    
                    <p class="mb-1 text-[10px] font-bold uppercase tracking-[0.15em] text-slate-400">Awaiting Approval</p>
                    <p class="mb-6 text-sm text-slate-500">Your proof is with our team. Approvals happen within a few hours on business days.</p>

                    <div class="mb-6 flex items-center gap-4 rounded-2xl border border-brand-100 bg-brand-50 p-4">
                        <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-brand-600 text-white">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-bold text-brand-800">Review in progress</p>
                            <p class="text-xs text-brand-600 mt-0.5">You'll be notified once your account is approved.</p>
                        </div>
                    </div>

                    
                    <details class="group rounded-xl border border-slate-200 bg-slate-50">
                        <summary class="flex cursor-pointer select-none items-center justify-between px-4 py-3 text-xs font-semibold text-slate-500 transition hover:text-slate-700">
                            <span>Submitted wrong file? Re-upload proof</span>
                            <svg class="h-4 w-4 transition-transform group-open:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </summary>
                        <div class="border-t border-slate-200 p-4">
                            <?php if($errors->any()): ?>
                                <div class="mb-3 rounded-xl border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-700 space-y-1">
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><p>• <?php echo e($err); ?></p><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php endif; ?>
                            <form method="POST" action="<?php echo e(route('member.pending.proof')); ?>"
                                  enctype="multipart/form-data" class="space-y-3">
                                <?php echo csrf_field(); ?>
                                <div>
                                    <label class="mb-1 block text-xs font-semibold text-slate-700">Transaction Reference <span class="font-normal text-slate-400">(optional)</span></label>
                                    <input type="text" name="reference" value="<?php echo e(old('reference')); ?>"
                                           placeholder="e.g. MP240123456"
                                           class="w-full rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-900 placeholder-slate-300 transition focus:border-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-500/20">
                                </div>
                                <div>
                                    <label class="mb-1 block text-xs font-semibold text-slate-700">New Screenshot / Receipt <span class="text-rose-400">*</span></label>
                                    <label for="proof-upload-2"
                                           class="group/up flex cursor-pointer flex-col items-center gap-2 rounded-xl border-2 border-dashed border-slate-200 bg-slate-50 px-6 py-7 text-center transition hover:border-brand-400 hover:bg-brand-50">
                                        <svg class="h-6 w-6 text-brand-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                        </svg>
                                        <span class="text-xs font-semibold text-slate-600">Click to choose file</span>
                                        <span class="text-xs text-slate-400">JPG, PNG or PDF — max 5 MB</span>
                                        <input id="proof-upload-2" type="file" name="proof" accept=".jpg,.jpeg,.png,.pdf" class="sr-only" required>
                                    </label>
                                    <p id="file-name-2" class="mt-1 hidden text-xs font-semibold text-brand-600"></p>
                                </div>
                                <button type="submit"
                                        class="w-full rounded-xl bg-brand-600 py-3 text-sm font-bold text-white shadow-md shadow-brand-500/20 transition hover:bg-brand-700">
                                    Re-submit Payment Proof
                                </button>
                            </form>
                        </div>
                    </details>

                <?php else: ?>
                    
                    <p class="mb-1 text-[10px] font-bold uppercase tracking-[0.15em] text-slate-400">Submit Payment Proof</p>
                    <p class="mb-5 text-sm text-slate-500">Upload a screenshot or receipt of your payment and we'll approve your account quickly.</p>

                    <?php if($errors->any()): ?>
                        <div class="mb-4 rounded-xl border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-700 space-y-1">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><p>• <?php echo e($err); ?></p><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="<?php echo e(route('member.pending.proof')); ?>"
                          enctype="multipart/form-data" class="space-y-4">
                        <?php echo csrf_field(); ?>

                        <div>
                            <label class="mb-1 block text-xs font-semibold text-slate-700">
                                Transaction Reference
                                <span class="ml-1 font-normal text-slate-400">(optional)</span>
                            </label>
                            <input type="text" name="reference" value="<?php echo e(old('reference')); ?>"
                                   placeholder="e.g. MP240123456 or bank reference number"
                                   class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3.5 py-2.5 text-sm text-slate-900 placeholder-slate-300 transition focus:border-brand-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-brand-500/20">
                        </div>

                        <div>
                            <label class="mb-1 block text-xs font-semibold text-slate-700">
                                Payment Screenshot / Receipt <span class="ml-1 text-rose-400">*</span>
                            </label>
                            <label for="proof-upload"
                                   class="group flex cursor-pointer flex-col items-center justify-center gap-3 rounded-2xl border-2 border-dashed border-slate-200 bg-slate-50 px-6 py-10 transition-colors hover:border-brand-400 hover:bg-brand-50">
                                <div id="upload-preview" class="hidden w-full text-center">
                                    <img id="preview-img" class="mx-auto max-h-44 rounded-xl shadow-md" src="" alt="Preview">
                                </div>
                                <div id="upload-placeholder" class="flex flex-col items-center gap-3 text-center">
                                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-brand-50 ring-2 ring-brand-100 transition-colors group-hover:bg-brand-100">
                                        <svg class="h-7 w-7 text-brand-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-slate-700 group-hover:text-brand-700">Click to upload file</p>
                                        <p class="mt-0.5 text-xs text-slate-400">JPG, PNG or PDF — max 5 MB</p>
                                    </div>
                                </div>
                                <input id="proof-upload" type="file" name="proof" accept=".jpg,.jpeg,.png,.pdf" class="sr-only" required>
                            </label>
                            <p id="file-name" class="mt-1.5 hidden text-xs font-semibold text-brand-600"></p>
                        </div>

                        <button type="submit"
                                class="flex w-full items-center justify-center gap-2 rounded-xl bg-brand-600 px-6 py-3.5 text-sm font-bold text-white shadow-lg shadow-brand-600/25 transition hover:bg-brand-700 active:scale-[0.98]">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Submit Payment Proof
                        </button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>

    
    <div class="mt-10">
        <p class="mb-5 text-center text-[10px] font-bold uppercase tracking-[0.2em] text-slate-400">What you unlock after approval</p>
        <div class="grid grid-cols-2 gap-4 sm:grid-cols-4">
            <?php $__currentLoopData = [
                ['emerald', 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253', 'Structured Courses', 'Starter → Pro'],
                ['amber',   'M9 3H5a2 2 0 0 0-2 2v4m6-6h10a2 2 0 0 1 2 2v4M9 3v18m0 0h10a2 2 0 0 0 2-2V9M9 21H5a2 2 0 0 1-2-2V9m0 0h18', 'Trading Robots', 'Automated EAs'],
                ['brand',   'M13 7h8m0 0v8m0-8l-8 8-4-4-6 6', 'Live Signals', '3 months access'],
                ['violet',  'M17 20h5v-2a3 3 0 0 0-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 0 1 5.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 0 1 9.288 0M15 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0z', '1-on-1 Mentorship', 'Expert sessions'],
            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$color, $path, $title, $sub]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="rounded-2xl border border-slate-200 bg-white p-5 text-center shadow-sm">
                    <div class="mx-auto mb-3 flex h-12 w-12 items-center justify-center rounded-2xl
                        <?php if($color==='emerald'): ?> bg-emerald-50 text-emerald-600 ring-1 ring-emerald-100
                        <?php elseif($color==='amber'): ?> bg-amber-50 text-amber-600 ring-1 ring-amber-100
                        <?php elseif($color==='brand'): ?> bg-brand-50 text-brand-600 ring-1 ring-brand-100
                        <?php else: ?> bg-violet-50 text-violet-600 ring-1 ring-violet-100 <?php endif; ?>">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="<?php echo e($path); ?>"/>
                        </svg>
                    </div>
                    <p class="text-sm font-bold text-slate-900"><?php echo e($title); ?></p>
                    <p class="mt-0.5 text-xs text-slate-400"><?php echo e($sub); ?></p>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <p class="mt-10 pb-8 text-center text-xs text-slate-400">
        Need help?
        <a href="mailto:support@emmioxforex.academy" class="font-semibold text-brand-500 hover:underline">support@emmioxforex.academy</a>
    </p>

</main>

<script>
(function () {
    // ── Global form submit loading state ──────────────────────────
    var SPINNER = '<svg class="h-4 w-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path></svg>';
    document.addEventListener('submit', function (e) {
        var form = e.target;
        if (form.hasAttribute('data-no-loading')) return;
        if (form.target === '_blank') return;
        var btn = form.querySelector('[type="submit"]');
        if (!btn || btn.disabled) return;
        btn._origHTML = btn.innerHTML;
        btn.disabled = true;
        btn.innerHTML = SPINNER + '<span>Please wait…</span>';
        btn.classList.add('opacity-75', 'cursor-not-allowed', 'gap-2', 'inline-flex', 'items-center', 'justify-center');
    }, true);
    window.addEventListener('pageshow', function (e) {
        if (!e.persisted) return;
        document.querySelectorAll('[type="submit"]').forEach(function (btn) {
            if (btn._origHTML) {
                btn.innerHTML = btn._origHTML;
                btn.disabled = btn._origDisabled || false;
                btn.classList.remove('opacity-75', 'cursor-not-allowed', 'gap-2', 'inline-flex', 'items-center', 'justify-center');
            }
        });
    });

    // ── Main upload zone
    var input       = document.getElementById('proof-upload');
    var preview     = document.getElementById('upload-preview');
    var previewImg  = document.getElementById('preview-img');
    var placeholder = document.getElementById('upload-placeholder');
    var fileNameEl  = document.getElementById('file-name');
    if (input) {
        input.addEventListener('change', function () {
            var file = this.files[0];
            if (!file) return;
            if (fileNameEl) { fileNameEl.textContent = '✓ ' + file.name; fileNameEl.classList.remove('hidden'); }
            if (file.type.startsWith('image/') && previewImg) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    previewImg.src = e.target.result;
                    if (preview)     preview.classList.remove('hidden');
                    if (placeholder) placeholder.classList.add('hidden');
                };
                reader.readAsDataURL(file);
            }
        });
    }

    // Re-upload zone (in <details>)
    var input2      = document.getElementById('proof-upload-2');
    var fileNameEl2 = document.getElementById('file-name-2');
    if (input2 && fileNameEl2) {
        input2.addEventListener('change', function () {
            var file = this.files[0];
            if (!file) return;
            fileNameEl2.textContent = '✓ ' + file.name;
            fileNameEl2.classList.remove('hidden');
        });
    }
})();
</script>

</body>
</html>
<?php /**PATH D:\projects\emmiox-academy\emmiox-academy\resources\views/member/pending.blade.php ENDPATH**/ ?>