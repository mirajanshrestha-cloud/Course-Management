<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    public function index()
    {
        return view('students.index', [
            'students' => Student::all(),
        ]);
    }

    public function create()
    {
        return view('students.create', [
            'courses' => Course::all(),
        ]);
    }

    public function store(Request $request)
    {
        $student = Student::create(
            $request->validate($this->rules())
        );

        return redirect()
            ->route('students.index')
            ->with('success', "Student {$student->name} created successfully!");
    }

    public function show(Student $student)
    {
        return view('students.show', [
            'student' => $student,
        ]);
    }

    public function edit(Student $student)
    {
        return view('students.edit', [
            'student' => $student,
            'courses' => Course::all(),
        ]);
    }

    public function update(Request $request, Student $student)
    {
        $student->update(
            $request->validate($this->rules($student))
        );

        return redirect()
            ->route('students.show', $student)
            ->with('success', 'Student updated successfully!');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()
            ->route('students.index')
            ->with('success', 'Student deleted successfully!');
    }

    private function rules(?Student $student = null): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('students', 'email')->ignore($student?->id),
            ],
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:500',
            'date_of_birth' => 'nullable|date',
            'course_id' => 'required|integer|exists:courses,id',
        ];
    }
}