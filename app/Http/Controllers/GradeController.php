<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\students;
use App\Models\Academic;
use App\Models\Diniyyah;
use App\Models\Tarbiah;
use App\Models\Grade;
use App\Models\StudentFeedback;

class GradeController extends Controller
{
    // Show the grading form for Academic
    public function academic($student_id)
    {
        $student = students::findOrFail($student_id);
        return view('teacher-subsystem.grades.academic', compact('student'));
    }

    // Store the grade and feedback for Academic
    public function storeAcademic(Request $request, $student_id)
    {
        $request->validate([
            'grade' => 'required|numeric',
            'feedback' => 'required|string|max:255',
        ]);

        // Convert numerical grade to letter grade
        $letterGrade = $this->convertToLetterGrade($request->grade);

        // Store grade
        $academic = new Academic();
        $academic->student_id = $student_id;
        $academic->grade = $letterGrade;  // Save letter grade
        $academic->save();

        // Store feedback
        $feedback = new StudentFeedback();
        $feedback->student_id = $student_id;
        $feedback->feedback = $request->feedback;
        $feedback->save();

        return redirect()->route('academic.grade', $student_id)->with('success', 'Grade and feedback saved successfully.');
    }

    // Show the grading form for Diniyyah
    public function diniyyah($student_id)
    {
        $student = students::findOrFail($student_id);
        return view('teacher-subsystem.grades.diniyyah', compact('student'));
    }

    // Store the grade and feedback for Diniyyah
    public function storeDiniyyah(Request $request, $student_id)
    {
        $request->validate([
            'grade' => 'required|numeric',
            'feedback' => 'required|string|max:255',
        ]);

        // Convert numerical grade to letter grade
        $letterGrade = $this->convertToLetterGrade($request->grade);

        // Store grade
        $diniyyah = new Diniyyah();
        $diniyyah->student_id = $student_id;
        $diniyyah->grade = $letterGrade;  // Save letter grade
        $diniyyah->save();

        // Store feedback
        $feedback = new StudentFeedback();
        $feedback->student_id = $student_id;
        $feedback->feedback = $request->feedback;
        $feedback->save();

        return redirect()->route('diniyyah.grade', $student_id)->with('success', 'Grade and feedback saved successfully.');
    }

    // Show the grading form for Tarbiah
    public function tarbiah($student_id)
    {
        $student = students::findOrFail($student_id);
        return view('teacher-subsystem.grades.tarbiah', compact('student'));
    }

    // Store the grade and feedback for Tarbiah
    public function storeTarbiah(Request $request, $student_id)
    {
        $request->validate([
            'grade' => 'required|numeric',
            'feedback' => 'required|string|max:255',
        ]);

        // Convert numerical grade to letter grade
        $letterGrade = $this->convertToLetterGrade($request->grade);

        // Store grade
        $tarbiah = new Tarbiah();
        $tarbiah->student_id = $student_id;
        $tarbiah->grade = $letterGrade;  // Save letter grade
        $tarbiah->save();

        // Store feedback
        $feedback = new StudentFeedback();
        $feedback->student_id = $student_id;
        $feedback->feedback = $request->feedback;
        $feedback->save();

        return redirect()->route('tarbiah.grade', $student_id)->with('success', 'Grade and feedback saved successfully.');
    }

    // Show the grading form (generic) for any student
    public function show($student_id)
    {
        $student = students::findOrFail($student_id);
        return view('teacher-subsystem.grades.show', compact('student'));
    }

    // Store the grade and feedback for any category
    public function store(Request $request, $student_id)
    {
        $request->validate([
            'grade' => 'required|numeric',
            'feedback' => 'required|string|max:255',
        ]);

        // Convert numerical grade to letter grade
        $letterGrade = $this->convertToLetterGrade($request->grade);

        // Store the grade and feedback for the generic case
        $grade = new Grade();
        $grade->student_id = $student_id;
        $grade->grade = $letterGrade;  // Save letter grade
        $grade->save();

        $feedback = new StudentFeedback();
        $feedback->student_id = $student_id;
        $feedback->feedback = $request->feedback;
        $feedback->save();

        return redirect()->route('grading.show', $student_id)->with('success', 'Grade and feedback saved successfully.');
    }

    // Convert numerical grade to letter grade
    private function convertToLetterGrade($grade)
    {
        if ($grade >= 90) {
            return 'A';
        } elseif ($grade >= 80) {
            return 'B';
        } elseif ($grade >= 70) {
            return 'C';
        } elseif ($grade >= 60) {
            return 'D';
        } elseif ($grade >= 50) {
            return 'E';
        } else {
            return 'F';
        }
    }
}
