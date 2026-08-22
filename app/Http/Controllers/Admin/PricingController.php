<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\MentorshipSession;
use App\Models\Robot;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PricingController extends Controller
{
    public function index(): View
    {
        return view('admin.pricing', [
            'courses'     => Course::orderByRaw("FIELD(level,'starter','intermediate','advanced','pro')")->orderBy('title')->get(),
            'robots'      => Robot::orderBy('name')->get(),
            'mentorships' => MentorshipSession::orderBy('title')->get(),
            'settings'    => [
                'registration_fee' => Setting::get('registration_fee', '50.00'),
                'signal_price'     => Setting::get('signal_price', '150.00'),
                'currency'         => Setting::get('currency', 'USD'),
                'usd_to_tzs'       => Setting::get('usd_to_tzs', '2600'),
            ],
        ]);
    }

    /** Update global pricing settings (reg fee, signal price, currency, rate). */
    public function updateSettings(Request $request): RedirectResponse
    {
        $request->validate([
            'registration_fee' => ['required', 'numeric', 'min:0'],
            'signal_price'     => ['required', 'numeric', 'min:0'],
            'currency'         => ['required', 'in:USD,TZS'],
            'usd_to_tzs'       => ['required', 'numeric', 'min:1'],
        ]);

        Setting::set('registration_fee', number_format((float) $request->registration_fee, 2, '.', ''));
        Setting::set('signal_price',     number_format((float) $request->signal_price, 2, '.', ''));
        Setting::set('currency',         $request->currency);
        Setting::set('usd_to_tzs',       $request->usd_to_tzs);

        return back()->with('success', 'Global pricing settings updated.');
    }

    /** Bulk-update all course prices from the pricing form. */
    public function updateCourses(Request $request): RedirectResponse
    {
        $request->validate(['prices' => ['required', 'array']]);

        foreach ($request->prices as $id => $price) {
            Course::where('id', $id)->update(['price' => (float) $price]);
        }

        return back()->with('success', 'Course prices updated.');
    }

    /** Bulk-update all robot prices. */
    public function updateRobots(Request $request): RedirectResponse
    {
        $request->validate(['prices' => ['required', 'array']]);

        foreach ($request->prices as $id => $price) {
            Robot::where('id', $id)->update(['price' => (float) $price]);
        }

        return back()->with('success', 'Robot prices updated.');
    }

    /** Bulk-update mentorship session prices. */
    public function updateMentorship(Request $request): RedirectResponse
    {
        $request->validate(['prices' => ['required', 'array']]);

        foreach ($request->prices as $id => $price) {
            MentorshipSession::where('id', $id)->update(['price' => (float) $price]);
        }

        return back()->with('success', 'Mentorship prices updated.');
    }
}
