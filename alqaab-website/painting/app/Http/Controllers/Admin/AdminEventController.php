<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\ContactUs;

class AdminEventController extends Controller
{
    public function EventBook()
    {
        $_panel = 'Event';
        $events = Event::latest()->get();
        return view('admin.events.events', compact('events', '_panel'));
    }
    public function destroyEvent($id)
    {
        $event = Event::findOrFail($id);

        // Delete the file using relative path
        if ($event->rider_path && file_exists($event->rider_path)) {
            unlink($event->rider_path);
        }

        // Delete the event record from the database
        $event->delete();

        return back()->with('success', 'Event deleted successfully!');
    }
  public function contactIndex()
    {
         $_panel = 'Contact Us';
        $contacts = ContactUs::latest()->get();
        return view('admin.events.contact', compact('contacts', '_panel'));
    }
    public function destroyContact($id)
    {
        $contact = ContactUs::findOrFail($id);
        $contact->delete();
        
        return back()->with('success', 'Contact message deleted successfully');
    }

}
