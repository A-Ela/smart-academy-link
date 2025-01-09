<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalendarController extends Controller
{
    public function index()
    {
        // Fetch events from the database
        $events = DB::table('events')->select('id', 'title', 'description', 'event_date as start')->get();

        // Return the calendar view with events data
        return view('teacher-subsystem.calendar', compact('events'));
    }
}

