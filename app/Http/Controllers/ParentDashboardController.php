<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParentDashboardController extends Controller
{
    /**
     * Display the parent dashboard.
     */
    public function index()
    {
        // Hardcoded sample data for UI testing
        $notifications = [
            [
                'message' => 'Upcoming Parent-Teacher Meeting',
                'date' => '2024-12-10',
            ],
            [
                'message' => 'Holiday Announcement',
                'date' => '2024-12-25',
            ],
        ];

        $students = [
            ['name' => 'Ali bin Abu'],
            ['name' => 'Minah binti Abu'],
        ];

        return view('parent-subsystem.parentDashboard', compact('notifications', 'students'));
    }
}
