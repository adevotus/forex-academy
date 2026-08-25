<?php if (isset($component)) { $__componentOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.public','data' => ['title' => 'About Us — EMMIOXFOREX ACADEMY']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.public'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'About Us — EMMIOXFOREX ACADEMY']); ?>

    
    <section class="border-b border-slate-200 bg-slate-50 px-4 py-20 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-4xl text-center">
            <span class="badge mx-auto">About Us</span>
            <h1 class="mt-5 text-4xl font-extrabold tracking-tight text-slate-900 sm:text-5xl">
                Welcome to<br>
                <span class="bg-gradient-to-r from-brand-500 to-gold-500 bg-clip-text text-transparent">EMMIOXFOREX ACADEMY</span>
            </h1>
            <p class="mx-auto mt-6 max-w-2xl text-lg leading-relaxed text-slate-600">
                A forex trading education and services platform dedicated to helping traders develop their knowledge,
                improve their trading skills, and access modern trading tools and professional support.
            </p>
        </div>
    </section>

    
    <section class="px-4 py-16 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-3xl">
            <p class="text-base leading-relaxed text-slate-600">
                Our platform brings together forex education, automated trading technology, mentorship, market signals,
                and trading support services in one place. Whether you are a beginner learning how the forex market
                works or an experienced trader looking for additional tools and guidance, our goal is to provide a
                structured environment for your trading journey.
            </p>
        </div>
    </section>

    
    <section class="bg-slate-50 px-4 py-20 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-6xl">
            <div class="mb-12 text-center">
                <span class="badge mx-auto mb-4">Services</span>
                <h2 class="text-3xl font-extrabold text-slate-900">What We Offer</h2>
                <p class="mt-3 text-base text-slate-500">One complete ecosystem for your trading growth.</p>
            </div>

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <?php $__currentLoopData = [
                    ['M9 3H5a2 2 0 0 0-2 2v4m6-6h10a2 2 0 0 1 2 2v4M9 3v18m0 0h10a2 2 0 0 0 2-2V9M9 21H5a2 2 0 0 1-2-2V9m0 0h18', 'Robot Subscription', 'Access our automated trading solutions, including the Financial Magnetic Robot EA, designed to assist traders with systematic trade execution and market participation.', 'bg-gold-50 text-gold-600 ring-gold-200'],
                    ['M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z', 'Account Management', 'Structured trading-account management for eligible clients under clearly defined terms, risk parameters, and service conditions.', 'bg-rose-50 text-rose-600 ring-rose-200'],
                    ['M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253', 'Online Forex Classes', 'Structured online classes from beginner to advanced — technical analysis, fundamental analysis, market structure, risk management, psychology, and strategy development.', 'bg-brand-50 text-brand-600 ring-brand-200'],
                    ['M17 20h5v-2a3 3 0 0 0-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 0 1 5.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 0 1 9.288 0M15 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0z', 'Professional Mentorship', 'Personalised guidance for traders who want to improve their understanding of the market, develop discipline, and build structured strategies.', 'bg-violet-50 text-violet-600 ring-violet-200'],
                    ['M13 7h8m0 0v8m0-8l-8 8-4-4-6 6', '3-Month Signal Subscription', 'Market setups and trading ideas with relevant entry, stop-loss, and take-profit information where applicable.', 'bg-emerald-50 text-emerald-600 ring-emerald-200'],
                    ['M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z', 'Account Flipping Services', 'For eligible clients seeking a more aggressive approach, subject to specific terms, risk controls, and acceptance of associated risks.', 'bg-amber-50 text-amber-600 ring-amber-200'],
                ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as [$path, $title, $desc, $iconClass]): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card-hover p-7">
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl ring-1 <?php echo e($iconClass); ?>">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="<?php echo e($path); ?>"/>
                            </svg>
                        </div>
                        <h3 class="mt-4 font-bold text-slate-900"><?php echo e($title); ?></h3>
                        <p class="mt-2 text-sm leading-relaxed text-slate-500"><?php echo e($desc); ?></p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

    
    <section class="px-4 py-20 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-3xl">
            <div class="rounded-2xl border border-gold-300/50 bg-gradient-to-br from-gold-50 to-amber-50 p-10 text-center">
                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-gold-100 ring-1 ring-gold-300/60">
                    <svg class="h-7 w-7 text-gold-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 0 0 .95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 0 0-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 0 0-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 0 0-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 0 0 .951-.69l1.519-4.674z"/>
                    </svg>
                </div>
                <h2 class="mt-6 text-2xl font-extrabold text-slate-900">Our Mission</h2>
                <p class="mx-auto mt-4 max-w-xl text-base leading-relaxed text-slate-600">
                    To combine Forex Education + Trading Technology + Professional Guidance to create a complete
                    ecosystem where traders can learn, develop, and access the tools they need to approach financial
                    markets more professionally.
                </p>
                <p class="mt-5 text-sm font-bold tracking-wide text-gold-600">Learn. Trade. Automate. Grow.</p>
            </div>

            
            <div class="mt-10 rounded-xl border border-slate-200 bg-slate-50 p-5 text-xs leading-relaxed text-slate-500">
                <strong class="font-semibold text-slate-700">Risk Disclosure:</strong> Forex and leveraged trading involve substantial
                risk and may result in partial or complete loss of capital. Trading signals, automated systems,
                mentorship, account management, and account flipping services do not guarantee profits or future
                performance. Past, demo, or backtested results are not guarantees of future results.
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
<?php /**PATH D:\projects\emmiox-academy\emmiox-academy\resources\views\public\about.blade.php ENDPATH**/ ?>