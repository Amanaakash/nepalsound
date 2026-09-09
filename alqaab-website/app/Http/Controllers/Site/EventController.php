<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EventController extends Controller
{
    public function storeEvent(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'event_start_date' => 'required|date',
            'event_end_date' => 'required|date|after_or_equal:event_start_date',
            'event_venue' => 'required|string|max:255',
            'event_description' => 'required|string|max:255',
            'estimated_attendance' => 'required|string',
            'needs' => 'required|string',
            'rider' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048', // Added image mime types
        ]);

        // Handle file upload
        $riderPath = null;
        if ($request->hasFile('rider')) {
            $uploadDir = 'upload_file'; // relative to public/
            
            // Make directory if not exists
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            $file = $request->file('rider');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move($uploadDir, $fileName);
            $riderPath = $uploadDir . '/' . $fileName;
        }

        // Save to database
        Event::create([
            'full_name' => $validated['full_name'],
            'company_name' => $validated['company_name'],
            'phone_number' => $validated['phone_number'],
            'email' => $validated['email'],
            'subject' => $validated['subject'],
            'event_start_date' => $validated['event_start_date'],
            'event_end_date' => $validated['event_end_date'],
            'event_venue' => $validated['event_venue'],
            'event_description' => $validated['event_description'],
            'estimated_attendance' => $validated['estimated_attendance'],
            'needs' => $validated['needs'],
            'rider_path' => $riderPath,
        ]);

        return back()->with('success', 'Event submitted successfully!');
    }

    public function storeContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'nullable|string',
        ]);
        
        ContactUs::create($validated);
        
        return back()->with('success', 'Your message has been sent successfully!');
    }

  
    

}
