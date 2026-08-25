<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        $messages = ContactMessage::latest()->paginate(20);
        $unreadCount = ContactMessage::unread()->count();

        return view('admin.contact.index', compact('messages', 'unreadCount'));
    }

    public function show(ContactMessage $contact): View
    {
        $contact->markRead();

        return view('admin.contact.show', compact('contact'));
    }

    public function markRead(ContactMessage $contact): RedirectResponse
    {
        $contact->markRead();

        return back()->with('success', 'Message marked as read.');
    }

    public function destroy(ContactMessage $contact): RedirectResponse
    {
        $contact->delete();

        return redirect()->route('admin.contact.index')->with('success', 'Message deleted.');
    }
}
