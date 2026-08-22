<?php if (isset($component)) { $__componentOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.public','data' => ['title' => 'Register — EMMIOXFOREX ACADEMY']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.public'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Register — EMMIOXFOREX ACADEMY']); ?>
    <section class="flex min-h-[80vh] items-center justify-center px-4 py-16">
        <div class="w-full max-w-md">
            <div class="card p-8">
                <div class="text-center">
                    <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-gold-500 to-gold-400 shadow-glow-gold">
                        <?php if (isset($component)) { $__componentOriginald88937ee957874c050ccbc67a5e19575 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald88937ee957874c050ccbc67a5e19575 = $attributes; } ?>
<?php $component = App\View\Components\Icon::resolve(['name' => 'sparkles','class' => 'h-5 w-5 text-navy-950'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('icon'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Icon::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald88937ee957874c050ccbc67a5e19575)): ?>
<?php $attributes = $__attributesOriginald88937ee957874c050ccbc67a5e19575; ?>
<?php unset($__attributesOriginald88937ee957874c050ccbc67a5e19575); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald88937ee957874c050ccbc67a5e19575)): ?>
<?php $component = $__componentOriginald88937ee957874c050ccbc67a5e19575; ?>
<?php unset($__componentOriginald88937ee957874c050ccbc67a5e19575); ?>
<?php endif; ?>
                    </div>
                    <h1 class="mt-4 text-2xl font-bold text-white">Join the Academy</h1>
                    <p class="mt-1 text-sm text-slate-400">A one-time registration fee applies — an admin will confirm your access shortly after.</p>
                </div>

                <?php echo $__env->make('partials.flash', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                <form method="POST" action="<?php echo e(route('register')); ?>" class="mt-6 space-y-4">
                    <?php echo csrf_field(); ?>
                    <div>
                        <label class="label">Full name</label>
                        <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="input" required autofocus>
                    </div>
                    <div>
                        <label class="label">Email</label>
                        <input type="email" name="email" value="<?php echo e(old('email')); ?>" class="input" required>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="label">Phone</label>
                            <input type="text" name="phone" value="<?php echo e(old('phone')); ?>" class="input">
                        </div>
                        <div>
                            <label class="label">Country</label>
                            <input type="text" name="country" value="<?php echo e(old('country')); ?>" class="input">
                        </div>
                    </div>
                    <div>
                        <label class="label">Password</label>
                        <input type="password" name="password" class="input" required>
                    </div>
                    <div>
                        <label class="label">Confirm password</label>
                        <input type="password" name="password_confirmation" class="input" required>
                    </div>
                    <button type="submit" class="btn-gold w-full">Create Account</button>
                </form>

                <p class="mt-6 text-center text-sm text-slate-500">
                    Already have an account?
                    <a href="<?php echo e(route('login')); ?>" class="font-semibold text-brand-300 hover:text-brand-200">Log in</a>
                </p>
            </div>
        </div>
    </section>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c0e86a062c1c5bb6d0e151b7076f3fd)): ?>
<?php $attributes = $__attributesOriginal8c0e86a062c1c5bb6d0e151b7076f3fd; ?>
<?php unset($__attributesOriginal8c0e86a062c1c5bb6d0e151b7076f3fd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c0e86a062c1c5bb6d0e151b7076f3fd)): ?>
<?php $component = $__componentOriginal8c0e86a062c1c5bb6d0e151b7076f3fd; ?>
<?php unset($__componentOriginal8c0e86a062c1c5bb6d0e151b7076f3fd); ?>
<?php endif; ?>
<?php /**PATH D:\projects\emmiox-academy\emmiox-academy\resources\views/auth/register.blade.php ENDPATH**/ ?>