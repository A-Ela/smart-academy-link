<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Show all events ordered by date (newest first)
    public function index()
    {
        // Fetch events ordered by date descending
        $events = Event::orderBy('event_date', 'desc')->get();
        return view('teacher-subsystem.events.index', compact('events'));
    }

    // Show the form to create a new event
    public function create()
    {
        return view('teacher-subsystem.events.create');
    }

    // Store a newly created event in the database
    public function store(Request $request)
    {
        dd($request->all());  // This will dump all form data to the screen
        
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'event_date' => 'required|date_format:d/m/Y',
        ]);

        // Convert the date to a format compatible with the database (e.g., Y-m-d)
        $eventDate = \DateTime::createFromFormat('d/m/Y', $request->event_date)->format('Y-m-d');

        Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'event_date' => $eventDate,
        ]);

        return redirect()->route('events.index')->with('success', 'Event created successfully');
    }

    // Fetch events in JSON format for the calendar (use this method for FullCalendar)
    public function fetchEvents()
    {
        $events = Event::all()->map(function($event) {
            return [
                'title' => $event->title, // Event title
                'start' => $event->event_date, // Start date (ensure format matches ISO 8601)
                'description' => $event->description, // Optional description field
            ];
        });

        return response()->json($events); // Return JSON response
    }

    // Show the form for editing an event
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('teacher-subsystem.events.edit', compact('event'));
    }

    // Update an event in the database
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'event_date' => 'required|date_format:d/m/Y',
        ]);

        $eventDate = \DateTime::createFromFormat('d/m/Y', $request->event_date)->format('Y-m-d');

        $event->update([
            'title' => $request->title,
            'description' => $request->description,
            'event_date' => $eventDate,
        ]);

        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }

    // Delete an event from the database
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }
}



