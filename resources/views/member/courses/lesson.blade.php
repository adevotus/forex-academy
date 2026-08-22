<x-layouts.member :title="$lesson->title">
    <x-slot name="header">
        <div>
            <a href="{{ route('member.courses.show', $course) }}" class="text-xs font-medium text-brand-300 hover:text-brand-200">&larr; {{ $course->title }}</a>
            <h1 class="mt-2 text-2xl font-bold text-white">{{ $lesson->title }}</h1>
        </div>
    </x-slot>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        <div class="lg:col-span-2">
            {{-- Video player --}}
            <div class="card flex aspect-video items-center justify-center overflow-hidden bg-black">
                <div class="text-center">
                    <x-icon name="play-solid" class="mx-auto h-14 w-14 text-brand-400" />
                    <p class="mt-3 text-sm text-slate-500">Lesson video player</p>
                    <p class="text-xs text-slate-600">{{ $lesson->video_url }}</p>
                </div>
            </div>

            <div class="card mt-6 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="font-semibold text-white">About this lesson</h2>
                        <p class="mt-1 text-xs text-slate-500">{{ $lesson->duration_minutes }} minutes</p>
                    </div>
                    <form method="POST" action="{{ route('member.courses.lesson.complete', [$course, $lesson]) }}">
                        @csrf
                        @if ($completedLessonIds->contains($lesson->id))
                            <span class="badge border-emerald-400/30 bg-emerald-400/10 text-emerald-300"><x-icon name="check" class="h-3.5 w-3.5" /> Completed</span>
                        @else
                            <button class="btn-primary !py-2 text-sm">Mark as Complete</button>
                        @endif
                    </form>
                </div>
                <p class="mt-3 text-sm leading-relaxed text-slate-400">{{ $lesson->description }}</p>
            </div>

            {{-- Quick quiz --}}
            @if ($lesson->quiz && $lesson->quiz->questions->count())
                <div class="card mt-6 p-6">
                    <h2 class="font-semibold text-white">Quick Check</h2>
                    <p class="mt-1 text-xs text-slate-500">3–5 questions to reinforce what you just learned.</p>

                    @if (session('quiz_result'))
                        @php $r = session('quiz_result'); @endphp
                        <div class="mt-4 rounded-lg border {{ $r['passed'] ? 'border-emerald-400/30 bg-emerald-400/10 text-emerald-300' : 'border-gold-400/30 bg-gold-400/10 text-gold-300' }} px-4 py-3 text-sm">
                            You scored {{ $r['score'] }} / {{ $r['total'] }} — {{ $r['passed'] ? 'Nice work!' : 'Give it another look and try again.' }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('member.courses.lesson.quiz', [$course, $lesson]) }}" class="mt-4 space-y-5">
                        @csrf
                        @foreach ($lesson->quiz->questions as $question)
                            <div>
                                <p class="text-sm font-medium text-slate-200">{{ $loop->iteration }}. {{ $question->question }}</p>
                                <div class="mt-2 space-y-2">
                                    @foreach ($question->options as $option)
                                        <label class="flex items-center gap-2 rounded-lg border border-white/10 bg-white/5 px-3 py-2 text-sm text-slate-300 hover:bg-white/10">
                                            <input type="radio" name="answers[{{ $question->id }}]" value="{{ $option->id }}" class="border-white/20 bg-navy-900 text-brand-500 focus:ring-brand-400" required>
                                            {{ $option->text }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                        <button class="btn-primary">Submit Answers</button>
                    </form>
                </div>
            @endif
        </div>

        {{-- Lesson list sidebar --}}
        <div class="card h-fit divide-y divide-white/5">
            @foreach ($course->lessons as $l)
                <a href="{{ route('member.courses.lesson', [$course, $l]) }}"
                   class="flex items-center gap-3 px-4 py-3 {{ $l->id === $lesson->id ? 'bg-white/5' : 'hover:bg-white/5' }}">
                    <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full {{ $completedLessonIds->contains($l->id) ? 'bg-emerald-400/20 text-emerald-300' : 'bg-white/5 text-slate-500' }} text-[11px] font-semibold">
                        @if($completedLessonIds->contains($l->id)) <x-icon name="check" class="h-3.5 w-3.5" /> @else {{ $loop->iteration }} @endif
                    </span>
                    <span class="truncate text-sm {{ $l->id === $lesson->id ? 'font-semibold text-white' : 'text-slate-300' }}">{{ $l->title }}</span>
                </a>
            @endforeach
        </div>
    </div>
</x-layouts.member>
