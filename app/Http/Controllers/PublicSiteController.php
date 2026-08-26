<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\MentorshipSession;
use App\Models\Robot;
use App\Models\Setting;
use App\Models\Testimonial;
use Illuminate\View\View;

class PublicSiteController extends Controller
{
    public function home(): View
    {
        $courses      = Course::where('published', true)->orderBy('order')->take(4)->get();
        $robots       = Robot::where('published', true)->take(2)->get();
        $testimonials = Testimonial::active()->ordered()->get(); // pass all so "View all" button count is correct

        return view('public.home', compact('courses', 'robots', 'testimonials'));
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

    public function testimonials(): View
    {
        $testimonials = Testimonial::active()->ordered()->get();

        return view('public.testimonials', compact('testimonials'));
    }

    public function pricing(): View
    {
        $courses          = Course::where('published', true)->orderBy('order')->get();
        $robots           = Robot::where('published', true)->get();
        $mentorships      = MentorshipSession::where('published', true)->get();
        $registrationFee  = Setting::get('registration_fee', '300.00');
        $signalPrice      = Setting::get('signal_price', '150.00');
        $currency         = Setting::get('currency', 'USD');

        return view('public.pricing', compact('courses', 'robots', 'mentorships', 'registrationFee', 'signalPrice', 'currency'));
    }
}
