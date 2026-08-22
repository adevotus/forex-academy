<x-layouts.public title="About Us — EMMIOXFOREX ACADEMY">
    <section class="px-4 py-20 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-4xl">
            <span class="badge">About Us</span>
            <h1 class="mt-4 text-4xl font-extrabold text-white">Welcome to EMMIOXFOREX ACADEMY</h1>
            <p class="mt-6 text-lg leading-relaxed text-slate-300">
                EMMIOXFOREX ACADEMY is a forex trading education and services platform dedicated to helping traders
                develop their knowledge, improve their trading skills, and access modern trading tools and professional
                support.
            </p>
            <p class="mt-4 leading-relaxed text-slate-400">
                Our platform brings together forex education, automated trading technology, mentorship, market signals,
                and trading support services in one place. Whether you are a beginner learning how the forex market
                works or an experienced trader looking for additional tools and guidance, our goal is to provide a
                structured environment for your trading journey.
            </p>

            <h2 class="mt-14 text-2xl font-bold text-white">What We Offer</h2>
            <div class="mt-6 grid grid-cols-1 gap-6 sm:grid-cols-2">
                @foreach ([
                    ['cpu', 'Robot Subscription', 'Access our automated trading solutions, including the Financial Magnetic Robot EA, designed to assist traders with systematic trade execution and market participation.'],
                    ['shield', 'Account Management', 'Structured trading-account management for eligible clients under clearly defined terms, risk parameters, and service conditions.'],
                    ['book', 'Online Forex Classes', 'Structured online classes from beginner to advanced — technical analysis, fundamental analysis, market structure, risk management, psychology, and strategy development.'],
                    ['users', 'Professional Mentorship', 'Personalised guidance for traders who want to improve their understanding of the market, develop discipline, and build structured strategies.'],
                    ['chart', '3-Month Forex Signal Subscription', 'Market setups and trading ideas with relevant entry, stop-loss, and take-profit information where applicable.'],
                    ['star', 'Account Flipping Services', 'For eligible clients seeking a more aggressive approach, subject to specific terms, risk controls, and acceptance of associated risks.'],
                ] as [$icon, $title, $desc])
                    <div class="card p-6">
                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-brand-500/15 text-brand-300">
                            <x-icon :name="$icon" class="h-5 w-5" />
                        </div>
                        <h3 class="mt-3 font-semibold text-white">{{ $title }}</h3>
                        <p class="mt-2 text-sm leading-relaxed text-slate-400">{{ $desc }}</p>
                    </div>
                @endforeach
            </div>

            <div class="mt-14 rounded-2xl border border-gold-400/20 bg-gold-400/5 p-8 text-center">
                <h2 class="text-2xl font-bold text-white">Our Mission</h2>
                <p class="mx-auto mt-3 max-w-2xl text-slate-300">
                    To combine Forex Education + Trading Technology + Professional Guidance to create a complete
                    ecosystem where traders can learn, develop, and access the tools they need to approach financial
                    markets more professionally.
                </p>
                <p class="mt-4 font-semibold text-gold-300">Learn. Trade. Automate. Grow.</p>
            </div>

            <div class="mt-10 rounded-xl border border-white/10 bg-white/5 p-5 text-xs leading-relaxed text-slate-500">
                <strong class="text-slate-400">Risk Disclosure:</strong> Forex and leveraged trading involve substantial
                risk and may result in partial or complete loss of capital. Trading signals, automated systems,
                mentorship, account management, and account flipping services do not guarantee profits or future
                performance. Past, demo, or backtested results are not guarantees of future results.
            </div>
        </div>
    </section>
</x-layouts.public>
