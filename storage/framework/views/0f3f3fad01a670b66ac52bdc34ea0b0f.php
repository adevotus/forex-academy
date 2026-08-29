<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => 'Forgot Password | EMMIOXFOREX ACADEMY']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Forgot Password | EMMIOXFOREX ACADEMY']); ?>
<div class="flex min-h-screen flex-col lg:flex-row">

    
    <div class="relative hidden overflow-hidden bg-brand-panel lg:flex lg:w-1/2 lg:flex-col">

        <div class="pointer-events-none absolute inset-0 bg-grid-glow opacity-70"></div>
        <div class="pointer-events-none absolute -top-32 -right-32 h-96 w-96 rounded-full bg-brand-500/10 blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-24 -left-24 h-80 w-80 rounded-full bg-gold-500/10 blur-3xl"></div>

        
        <div class="relative z-10 p-10">
            <?php echo $__env->make('partials.logo', ['dark' => true], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>

        
        <div class="relative z-10 flex flex-1 items-center px-10 pb-10">
            <div class="w-full">
                <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-brand-500/20 ring-1 ring-brand-400/30">
                    <svg class="h-8 w-8 text-brand-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                    </svg>
                </div>

                <h2 class="mt-8 text-3xl font-extrabold leading-snug text-white">
                    Recover Your<br><span class="text-brand-300">Account Access</span>
                </h2>
                <p class="mt-4 text-base leading-relaxed text-slate-400">
                    Enter the email address linked to your Academy account and we'll verify it so you can set a new password instantly — no waiting, no email links.
                </p>

                <div class="mt-10 space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-full bg-brand-500/20 ring-1 ring-brand-400/30">
                            <span class="text-xs font-bold text-brand-300">1</span>
                        </div>
                        <p class="text-sm text-slate-400">Enter your registered email address</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-full bg-brand-500/20 ring-1 ring-brand-400/30">
                            <span class="text-xs font-bold text-brand-300">2</span>
                        </div>
                        <p class="text-sm text-slate-400">We verify it matches an existing account</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-full bg-emerald-500/20 ring-1 ring-emerald-400/30">
                            <span class="text-xs font-bold text-emerald-300">3</span>
                        </div>
                        <p class="text-sm text-slate-400">Set your new password immediately</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="flex flex-1 flex-col items-center justify-center bg-white px-6 py-12 sm:px-10">

        
        <div class="w-full max-w-sm mb-2 flex justify-start">
            <a href="<?php echo e(route('login')); ?>"
               class="inline-flex items-center gap-1.5 text-xs font-medium text-slate-400 hover:text-brand-500 transition-colors">
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to login
            </a>
        </div>

        
        <div class="mb-8 lg:hidden">
            <?php echo $__env->make('partials.logo', ['dark' => false], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>

        <div class="w-full max-w-sm">

            
            <div class="mb-8">
                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-amber-50 ring-1 ring-amber-200">
                    <svg class="h-5 w-5 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                    </svg>
                </div>
                <h1 class="mt-5 text-2xl font-extrabold text-slate-900">Forgot your password?</h1>
                <p class="mt-1.5 text-sm text-slate-500">Enter your email and we'll verify your account.</p>
            </div>

            <?php echo $__env->make('partials.flash', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

            <form method="POST" action="<?php echo e(route('password.verify')); ?>" class="space-y-5">
                <?php echo csrf_field(); ?>

                <div>
                    <label class="label" for="email">
                        <span class="flex items-center gap-1.5">
                            <svg class="h-3.5 w-3.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            Email address
                        </span>
                    </label>
                    <input id="email" type="email" name="email" value="<?php echo e(old('email')); ?>"
                           class="input <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-rose-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                           placeholder="you@example.com" required autofocus>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-xs text-rose-500"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                
                <div class="flex items-start gap-2.5 rounded-xl border border-slate-200 bg-slate-50 px-4 py-3">
                    <svg class="mt-0.5 h-4 w-4 flex-shrink-0 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <p class="text-xs leading-relaxed text-slate-500">
                        This must be the email address you used to create your Academy account. If your email has changed, contact our admin team for assistance.
                    </p>
                </div>

                <button type="submit" class="btn-primary w-full py-3 text-base">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Verify My Email
                </button>
            </form>

            <div class="mt-6 text-center text-sm text-slate-500">
                Remembered your password?
                <a href="<?php echo e(route('login')); ?>" class="font-semibold text-brand-500 hover:text-brand-600 transition">Log in &rarr;</a>
            </div>

        </div>
    </div>
</div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $attributes = $__attributesOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__attributesOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5863877a5171c196453bfa0bd807e410)): ?>
<?php $component = $__componentOriginal5863877a5171c196453bfa0bd807e410; ?>
<?php unset($__componentOriginal5863877a5171c196453bfa0bd807e410); ?>
<?php endif; ?>
<?php /**PATH D:\projects\emmiox-academy\emmiox-academy\resources\views/auth/forgot-password.blade.php ENDPATH**/ ?>