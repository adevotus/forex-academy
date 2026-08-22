<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\MentorshipSession;
use App\Models\Robot;
use Illuminate\View\View;

class PublicSiteController extends Controller
{
    public function home(): View
    {
        $courses = Course::where('published', true)->orderBy('order')->take(4)->get();
        $robots = Robot::where('published', true)->take(2)->get();

        return view('public.home', compact('courses', 'robots'));
    }

    public function about(): View
    {
        return view('public.about');
    }

    public function courses(): View
    {
        $courses = Course::where('published', true)->orderBy('order')->get()->groupBy('level');

        return view('public.courses', compact('courses'));
    }

    public function courseShow(Course $course): View
    {
        $course->load('lessons');

        return view('public.course-show', compact('course'));
    }

    public function robots(): View
    {
        $robots = Robot::where('published', true)->get();

        return view('public.robots', compact('robots'));
    }

    public function pricing(): View
    {
        $courses = Course::where('published', true)->orderBy('order')->get();
        $robots = Robot::where('published', true)->get();
        $mentorships = MentorshipSession::where('published', true)->get();

        return view('public.pricing', compact('courses', 'robots', 'mentorships'));
    }
}
