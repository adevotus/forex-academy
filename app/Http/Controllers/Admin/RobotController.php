<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Robot;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class RobotController extends Controller
{
    public function index(): View
    {
        $robots = Robot::withCount('subscriptions')->latest()->get();

        return view('admin.robots.index', compact('robots'));
    }

    public function create(): View
    {
        return view('admin.robots.form', ['robot' => new Robot]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data['slug'] = Str::slug($data['name']).'-'.Str::random(5);

        Robot::create($data);

        return redirect()->route('admin.robots.index')->with('status', 'Robot / EA created.');
    }

    public function edit(Robot $robot): View
    {
        return view('admin.robots.form', compact('robot'));
    }

    public function update(Request $request, Robot $robot): RedirectResponse
    {
        $robot->update($this->validated($request));

        return redirect()->route('admin.robots.index')->with('status', 'Robot / EA updated.');
    }

    public function destroy(Robot $robot): RedirectResponse
    {
        $robot->delete();

        return back()->with('status', 'Robot removed.');
    }

    protected function validated(Request $request): array
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'version' => ['nullable', 'string', 'max:50'],
            'price' => ['required', 'numeric', 'min:0'],
            'duration_days' => ['nullable', 'integer', 'min:1'],
            'published' => ['nullable', 'boolean'],
            'image' => ['nullable', 'string', 'max:255'],
            'file_path' => ['nullable', 'string', 'max:255'],
        ]);

        $data['price'] = (int) round($data['price'] * 100);
        $data['duration_days'] = $data['duration_days'] ?? 90;
        $data['published'] = $request->boolean('published');
        $data['version'] = $data['version'] ?? '1.0';

        return $data;
    }
}
