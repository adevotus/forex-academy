<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MentorshipSession;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MentorshipController extends Controller
{
    public function index(): View
    {
        $sessions = MentorshipSession::withCount('bookings')->latest()->get();

        return view('admin.mentorship.index', compact('sessions'));
    }

    public function create(): View
    {
        return view('admin.mentorship.form', ['session' => new MentorshipSession]);
    }

    public function store(Request $request): RedirectResponse
    {
        MentorshipSession::create($this->validated($request));

        return redirect()->route('admin.mentorship.index')->with('status', 'Mentorship package created.');
    }

    public function edit(MentorshipSession $mentorship): View
    {
        return view('admin.mentorship.form', ['session' => $mentorship]);
    }

    public function update(Request $request, MentorshipSession $mentorship): RedirectResponse
    {
        $mentorship->update($this->validated($request));

        return redirect()->route('admin.mentorship.index')->with('status', 'Mentorship package updated.');
    }

    public function destroy(MentorshipSession $mentorship): RedirectResponse
    {
        $mentorship->delete();

        return back()->with('status', 'Mentorship package removed.');
    }

    protected function validated(Request $request): array
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'mentor_name' => ['nullable', 'string', 'max:255'],
            'type' => ['required', 'in:group,one_on_one'],
            'price' => ['required', 'numeric', 'min:0'],
            'published' => ['nullable', 'boolean'],
        ]);

        $data['price'] = (int) round($data['price'] * 100);
        $data['published'] = $request->boolean('published');

        return $data;
    }
}
