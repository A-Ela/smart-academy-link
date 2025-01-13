<?php

namespace App\Http\Controllers;

use App\Models\students;
use App\Models\Hafazan;  // Ensure you import the Hafazan model
use Illuminate\Http\Request;

class HafazanController extends Controller
{
    // Display the Hafazan form
    public function create()    
    {
        $students = students::all(); // Fetch all students
        
        // Define the Surah names manually as an array
        $surahs = [
            'Al-Fatiha', 'Al-Baqarah', 'Aali Imran', 'An-Nisa', 'Al-Ma’idah', 
            'Al-An’am', 'Al-A’raf', 'Al-Anfal', 'At-Tawbah', 'Yunus', 
            'Hud', 'Yusuf', 'Ibrahim', 'Al-Hijr', 'An-Nahl', 'Al-Isra', 
            'Al-Kahf', 'Maryam', 'Taha', 'Al-Anbiya', 'Al-Hajj', 
            'Al-Mu’minun', 'Al-Furqan', 'Ash-Shu’ara', 'An-Naml', 'Al-Ahqaf',
            'Sad', 'Az-Zumar', 'Fussilat', 'Al-Jathiya', 'Al-Ahqaf',
            'Qamar', 'Ar-Rahman', 'Al-Waqi’a', 'Al-Mulk', 'Al-Qalam', 
            'Al-Haqqah', 'Al-Maarij', 'Nuh', 'Al-Jinn', 'Al-Muzzammil',
            'Al-Mudathir', 'Al-Qiyama', 'Al-Insan', 'Al-Mursalat', 
            'An-Naba', 'At-Takwir', 'Al-Infitar', 'Al-Mutaffifin', 
            'Al-Qari’a', 'Al-Ma’un', 'Al-Kawthar', 'Al-Kafirun', 'An-Nasr',
            'Al-Masad', 'Al-Ikhlas', 'Al-Falaq', 'An-Nas'
        ];

        return view('hafazan.create', compact('students', 'surahs')); // Pass students and surahs to view
    }

    // Store the Hafazan assignment
    public function store(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'surah_name' => 'nullable|string', // Validate if user enters surah_name manually
            'ayah_number' => 'required|integer|min:1',
            'recite_date' => 'required|date', // Validate recite_date
        ]);

        // Get the Surah name from the form
        $surah_name = $validated['surah_name'];

        // Store the Hafazan assignment
        Hafazan::create([
            'student_id' => $validated['student_id'],
            'surah_name' => $surah_name, // Store the selected or manually entered Surah name
            'ayah_number' => $validated['ayah_number'],
            'recite_date' => $validated['recite_date'], // Store the date for reciting
        ]);

        // Redirect with success message
        return redirect()->route('hafazan.create')->with('success', 'Hafazan & Tilawah assigned successfully!');
    }

    // View the list of students and their Hafazan assignments
    public function list()
    {
        $hafazans = Hafazan::with('student') // Include student details
                            ->get(); // Get all Hafazan assignments

        return view('hafazan.list', compact('hafazans'));
    }

    // Show the form for editing a specific Hafazan assignment
    public function edit($id)
    {
        $hafazan = Hafazan::findOrFail($id); // Find the Hafazan by its ID
        $students = students::all(); // Get the list of students
        $surahs = [
            'Al-Fatiha', 'Al-Baqarah', 'Aali Imran', 'An-Nisa', 'Al-Ma’idah', 
            'Al-An’am', 'Al-A’raf', 'Al-Anfal', 'At-Tawbah', 'Yunus', 
            'Hud', 'Yusuf', 'Ibrahim', 'Al-Hijr', 'An-Nahl', 'Al-Isra', 
            'Al-Kahf', 'Maryam', 'Taha', 'Al-Anbiya', 'Al-Hajj', 
            'Al-Mu’minun', 'Al-Furqan', 'Ash-Shu’ara', 'An-Naml', 'Al-Ahqaf',
            'Sad', 'Az-Zumar', 'Fussilat', 'Al-Jathiya', 'Al-Ahqaf',
            'Qamar', 'Ar-Rahman', 'Al-Waqi’a', 'Al-Mulk', 'Al-Qalam', 
            'Al-Haqqah', 'Al-Maarij', 'Nuh', 'Al-Jinn', 'Al-Muzzammil',
            'Al-Mudathir', 'Al-Qiyama', 'Al-Insan', 'Al-Mursalat', 
            'An-Naba', 'At-Takwir', 'Al-Infitar', 'Al-Mutaffifin', 
            'Al-Qari’a', 'Al-Ma’un', 'Al-Kawthar', 'Al-Kafirun', 'An-Nasr',
            'Al-Masad', 'Al-Ikhlas', 'Al-Falaq', 'An-Nas'
        ];
        
        return view('hafazan.edit', compact('hafazan', 'students', 'surahs')); // Pass data to the view
    }

    // Update the specified Hafazan assignment in the database
    public function update(Request $request, $id)
    {
        // Validate the input
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'surah_name' => 'nullable|string',
            'ayah_number' => 'required|integer|min:1',
            'recite_date' => 'required|date',
        ]);

        // Find the Hafazan by its ID
        $hafazan = Hafazan::findOrFail($id);

        // Update the Hafazan assignment
        $hafazan->update([
            'student_id' => $validated['student_id'],
            'surah_name' => $validated['surah_name'],
            'ayah_number' => $validated['ayah_number'],
            'recite_date' => $validated['recite_date'],
        ]);

        return redirect()->route('hafazan.list')->with('success', 'Hafazan assignment updated successfully!');
    }

    // Delete the specified Hafazan assignment
    public function destroy($id)
    {
        $hafazan = Hafazan::findOrFail($id); // Find the Hafazan by its ID
        $hafazan->delete(); // Delete the Hafazan record

        return redirect()->route('hafazan.list')->with('success', 'Hafazan assignment deleted successfully.');
    }
}
