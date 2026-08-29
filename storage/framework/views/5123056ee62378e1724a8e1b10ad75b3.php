<?php if (isset($component)) { $__componentOriginal5863877a5171c196453bfa0bd807e410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5863877a5171c196453bfa0bd807e410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.app','data' => ['title' => 'Reset Password | EMMIOXFOREX ACADEMY']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Reset Password | EMMIOXFOREX ACADEMY']); ?>
<div class="flex min-h-screen flex-col lg:flex-row">

    
    <div class="relative hidden overflow-hidden bg-brand-panel lg:flex lg:w-1/2 lg:flex-col">

        <div class="pointer-events-none absolute inset-0 bg-grid-glow opacity-70"></div>
        <div class="pointer-events-none absolute -top-32 -right-32 h-96 w-96 rounded-full bg-brand-500/10 blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-24 -left-24 h-80 w-80 rounded-full bg-emerald-500/10 blur-3xl"></div>

        
        <div class="relative z-10 p-10">
            <?php echo $__env->make('partials.logo', ['dark' => true], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>

        
        <div class="relative z-10 flex flex-1 items-center px-10 pb-10">
            <div class="w-full">
                <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-emerald-500/20 ring-1 ring-emerald-400/30">
                    <svg class="h-8 w-8 text-emerald-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>

                <h2 class="mt-8 text-3xl font-extrabold leading-snug text-white">
                    Almost There —<br><span class="text-emerald-300">Set Your New Password</span>
                </h2>
                <p class="mt-4 text-base leading-relaxed text-slate-400">
                    Your identity has been verified. Choose a strong password to secure your Academy account and get back to trading.
                </p>

                
                <div class="mt-10 rounded-2xl border border-white/10 bg-white/5 p-6 space-y-3">
                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">Password tips</p>
                    <div class="flex items-center gap-2.5 text-sm text-slate-400">
                        <svg class="h-4 w-4 flex-shrink-0 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        At least 8 characters long
                    </div>
                    <div class="flex items-center gap-2.5 text-sm text-slate-400">
                        <svg class="h-4 w-4 flex-shrink-0 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        Mix letters, numbers &amp; symbols
                    </div>
                    <div class="flex items-center gap-2.5 text-sm text-slate-400">
                        <svg class="h-4 w-4 flex-shrink-0 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        Don't reuse old passwords
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="flex flex-1 flex-col items-center justify-center bg-white px-6 py-12 sm:px-10">

        
        <div class="w-full max-w-sm mb-2 flex justify-start">
            <a href="<?php echo e(route('password.request')); ?>"
               class="inline-flex items-center gap-1.5 text-xs font-medium text-slate-400 hover:text-brand-500 transition-colors">
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back
            </a>
        </div>

        
        <div class="mb-8 lg:hidden">
            <?php echo $__env->make('partials.logo', ['dark' => false], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>

        <div class="w-full max-w-sm">

            
            <div class="mb-8">
                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-50 ring-1 ring-emerald-200">
                    <svg class="h-5 w-5 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                </div>
                <h1 class="mt-5 text-2xl font-extrabold text-slate-900">Set new password</h1>
                <p class="mt-1.5 text-sm text-slate-500">
                    Resetting password for
                    <span class="font-semibold text-slate-700"><?php echo e($email); ?></span>
                </p>
            </div>

            <?php echo $__env->make('partials.flash', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

            <form method="POST" action="<?php echo e(route('password.update')); ?>" class="space-y-5">
                <?php echo csrf_field(); ?>

                
                <div>
                    <label class="label" for="password">
                        <span class="flex items-center gap-1.5">
                            <svg class="h-3.5 w-3.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                            </svg>
                            New Password
                        </span>
                    </label>
                    <div class="relative">
                        <input id="password" type="password" name="password"
                               class="input pr-11 <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-rose-300 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               placeholder="••••••••" required autocomplete="new-password">
                        <button type="button" onclick="togglePw('password','eye1')"
                                class="absolute inset-y-0 right-3 flex items-center text-slate-400 hover:text-slate-600 transition">
                            <svg id="eye1" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </button>
                    </div>
                    <?php $__errorArgs = ['password'];
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

                
                <div>
                    <label class="label" for="password_confirmation">
                        <span class="flex items-center gap-1.5">
                            <svg class="h-3.5 w-3.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Confirm New Password
                        </span>
                    </label>
                    <div class="relative">
                        <input id="password_confirmation" type="password" name="password_confirmation"
                               class="input pr-11"
                               placeholder="••••••••" required autocomplete="new-password">
                        <button type="button" onclick="togglePw('password_confirmation','eye2')"
                                class="absolute inset-y-0 right-3 flex items-center text-slate-400 hover:text-slate-600 transition">
                            <svg id="eye2" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </button>
                    </div>
                </div>

                
                <div id="strength-wrap" class="hidden">
                    <div class="flex items-center gap-2">
                        <div class="flex flex-1 gap-1">
                            <div id="bar1" class="h-1.5 flex-1 rounded-full bg-slate-200 transition-colors duration-300"></div>
                            <div id="bar2" class="h-1.5 flex-1 rounded-full bg-slate-200 transition-colors duration-300"></div>
                            <div id="bar3" class="h-1.5 flex-1 rounded-full bg-slate-200 transition-colors duration-300"></div>
                            <div id="bar4" class="h-1.5 flex-1 rounded-full bg-slate-200 transition-colors duration-300"></div>
                        </div>
                        <span id="strength-label" class="text-xs font-medium text-slate-400 w-14 text-right"></span>
                    </div>
                </div>

                <p class="text-xs text-slate-400">Minimum 8 characters.</p>

                <button type="submit" class="btn-primary w-full py-3 text-base">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                    Reset Password
                </button>
            </form>

        </div>
    </div>
</div>

<script>
function togglePw(inputId, eyeId) {
    const input = document.getElementById(inputId);
    if (input) input.type = input.type === 'password' ? 'text' : 'password';
}

// Password strength meter
(function () {
    const pwInput = document.getElementById('password');
    const wrap    = document.getElementById('strength-wrap');
    const bars    = [document.getElementById('bar1'), document.getElementById('bar2'),
                     document.getElementById('bar3'), document.getElementById('bar4')];
    const label   = document.getElementById('strength-label');

    const levels = [
        { color: 'bg-rose-400',    textColor: 'text-rose-500',    text: 'Weak'   },
        { color: 'bg-amber-400',   textColor: 'text-amber-500',   text: 'Fair'   },
        { color: 'bg-blue-400',    textColor: 'text-blue-500',    text: 'Good'   },
        { color: 'bg-emerald-400', textColor: 'text-emerald-500', text: 'Strong' },
    ];

    function score(pw) {
        let s = 0;
        if (pw.length >= 8)           s++;
        if (/[A-Z]/.test(pw))         s++;
        if (/[0-9]/.test(pw))         s++;
        if (/[^A-Za-z0-9]/.test(pw))  s++;
        return s;
    }

    pwInput.addEventListener('input', function () {
        const pw = this.value;
        if (!pw) { wrap.classList.add('hidden'); return; }
        wrap.classList.remove('hidden');

        const s = Math.max(score(pw), 1);
        bars.forEach((b, i) => {
            b.className = 'h-1.5 flex-1 rounded-full transition-colors duration-300 ' +
                (i < s ? levels[s - 1].color : 'bg-slate-200');
        });
        label.className = 'text-xs font-medium w-14 text-right ' + levels[s - 1].textColor;
        label.textContent = levels[s - 1].text;
    });
})();
</script>
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
<?php /**PATH D:\projects\emmiox-academy\emmiox-academy\resources\views/auth/reset-password.blade.php ENDPATH**/ ?>