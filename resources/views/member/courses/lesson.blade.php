<x-layouts.member :title="$lesson->title">
    <x-slot name="header">
        <div>
            <a href="{{ route('member.courses.show', $course) }}" class="text-xs font-medium text-brand-600 hover:text-brand-700">&larr; {{ $course->title }}</a>
            <h1 class="mt-2 text-2xl font-bold text-slate-900">{{ $lesson->title }}</h1>
        </div>
    </x-slot>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        <div class="lg:col-span-2">

            {{-- ── Video Player ── --}}
            <div class="card overflow-hidden bg-black">
                @if ($lesson->video_path)
                    {{-- Uploaded MP4 --}}
                    <video id="lesson-video" controls class="w-full" style="max-height:480px"
                           @if($lesson->thumbnail) poster="{{ asset('storage/'.$lesson->thumbnail) }}" @endif>
                        <source src="{{ asset('storage/'.$lesson->video_path) }}" type="video/mp4">
                        Your browser does not support the video player.
                    </video>
                @elseif ($lesson->video_url)
                    @php
                        $videoUrl = $lesson->video_url;
                        $isYoutube = preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]+)/', $videoUrl, $ytm);
                        $isVimeo   = preg_match('/vimeo\.com\/(\d+)/', $videoUrl, $vim);
                    @endphp
                    @if ($isYoutube)
                        <div class="aspect-video">
                            <iframe class="h-full w-full" src="https://www.youtube.com/embed/{{ $ytm[1] }}?rel=0"
                                    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                        </div>
                    @elseif ($isVimeo)
                        <div class="aspect-video">
                            <iframe class="h-full w-full" src="https://player.vimeo.com/video/{{ $vim[1] }}"
                                    frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    @else
                        <video id="lesson-video" controls class="w-full" style="max-height:480px">
                            <source src="{{ $videoUrl }}" type="video/mp4">
                        </video>
                    @endif
                @else
                    <div class="flex aspect-video flex-col items-center justify-center gap-3 bg-slate-900 text-center px-6">
                        <svg class="h-14 w-14 text-slate-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 010 1.972l-11.54 6.347a1.125 1.125 0 01-1.667-.986V5.653z"/>
                        </svg>
                        <p class="text-sm text-slate-400">Video not yet available for this lesson.</p>
                    </div>
                @endif
            </div>

            {{-- ── About & Complete ── --}}
            <div class="card mt-6 p-6">
                <div class="flex flex-wrap items-start justify-between gap-4">
                    <div>
                        <h2 class="font-semibold text-slate-900">About this lesson</h2>
                        @if($lesson->duration_minutes)
                            <p class="mt-0.5 text-xs text-slate-500">{{ $lesson->duration_minutes }} minutes</p>
                        @endif
                    </div>
                    <form id="complete-form" method="POST" action="{{ route('member.courses.lesson.complete', [$course, $lesson]) }}">
                        @csrf
                        @if ($completedLessonIds->contains($lesson->id))
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-emerald-100 px-3 py-1.5 text-xs font-semibold text-emerald-700">
                                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                Completed
                            </span>
                        @else
                            <button type="submit" class="btn-primary !py-2 text-sm">Mark as Complete</button>
                        @endif
                    </form>
                </div>
                @if($lesson->description)
                    <p class="mt-3 text-sm leading-relaxed text-slate-600">{{ $lesson->description }}</p>
                @endif
            </div>

            {{-- ── Quick Quiz ── --}}
            @if ($lesson->quiz && $lesson->quiz->questions->count())
                <div class="card mt-6 p-6">
                    <h2 class="font-semibold text-slate-900">Quick Check</h2>
                    <p class="mt-1 text-xs text-slate-500">A few questions to reinforce what you just learned.</p>

                    @if (session('quiz_result'))
                        @php $r = session('quiz_result'); @endphp
                        <div class="mt-4 rounded-lg border px-4 py-3 text-sm
                            {{ $r['passed'] ? 'border-emerald-200 bg-emerald-50 text-emerald-700' : 'border-amber-200 bg-amber-50 text-amber-700' }}">
                            You scored {{ $r['score'] }} / {{ $r['total'] }} — {{ $r['passed'] ? 'Nice work!' : 'Give it another look and try again.' }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('member.courses.lesson.quiz', [$course, $lesson]) }}" class="mt-4 space-y-5">
                        @csrf
                        @foreach ($lesson->quiz->questions as $question)
                            <div>
                                <p class="text-sm font-medium text-slate-800">{{ $loop->iteration }}. {{ $question->question }}</p>
                                <div class="mt-2 space-y-2">
                                    @foreach ($question->options as $option)
                                        <label class="flex cursor-pointer items-center gap-2 rounded-lg border border-slate-200 bg-slate-50 px-3 py-2 text-sm text-slate-700 hover:bg-brand-50 hover:border-brand-200 transition">
                                            <input type="radio" name="answers[{{ $question->id }}]" value="{{ $option->id }}"
                                                   class="text-brand-500 focus:ring-brand-400" required>
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

        {{-- ── Lesson List Sidebar ── --}}
        <div class="card h-fit overflow-hidden divide-y divide-slate-100">
            <div class="border-b border-slate-100 bg-slate-50 px-4 py-3">
                <p class="text-xs font-bold uppercase tracking-wide text-slate-600">Course Lessons</p>
            </div>
            @foreach ($course->lessons as $l)
                <a href="{{ route('member.courses.lesson', [$course, $l]) }}"
                   class="flex items-center gap-3 px-4 py-3 transition
                          {{ $l->id === $lesson->id ? 'bg-brand-50' : 'hover:bg-slate-50' }}">
                    <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full text-[11px] font-semibold
                          {{ $completedLessonIds->contains($l->id) ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-500' }}">
                        @if($completedLessonIds->contains($l->id))
                            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        @else
                            {{ $loop->iteration }}
                        @endif
                    </span>
                    <span class="truncate text-sm {{ $l->id === $lesson->id ? 'font-semibold text-brand-700' : 'text-slate-700' }}">
                        {{ $l->title }}
                    </span>
                    @if($l->id === $lesson->id)
                        <svg class="ml-auto h-3.5 w-3.5 flex-shrink-0 text-brand-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                    @endif
                </a>
            @endforeach
        </div>
    </div>

    {{-- Auto-submit complete form when uploaded video finishes --}}
    @if (!$completedLessonIds->contains($lesson->id) && $lesson->video_path)
        <script>
        document.addEventListener('DOMContentLoaded', function () {
            const video = document.getElementById('lesson-video');
            if (video) {
                video.addEventListener('ended', function () {
                    document.getElementById('complete-form').submit();
                });
            }
        });
        </script>
    @endif

</x-layouts.member>
