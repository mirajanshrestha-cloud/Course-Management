<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CourseController extends Controller
{
    public function index()
    {
        return view('courses.index', [
            'courses' => Course::all(),
        ]);
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->rules());

        $validated['is_active'] = $request->boolean('is_active');

        $course = Course::create($validated);

        return redirect()
            ->route('courses.index')
            ->with('success', "Course {$course->name} created successfully!");
    }

    public function show(Course $course)
    {
        return view('courses.show', [
            'course' => $course,
        ]);
    }

    public function edit(Course $course)
    {
        return view('courses.edit', [
            'course' => $course,
        ]);
    }

    public function update(Request $request, Course $course)
    {
        $validated = $request->validate($this->rules($course));

        $validated['is_active'] = $request->boolean('is_active');

        $course->update($validated);

        return redirect()
            ->route('courses.show', $course)
            ->with('success', 'Course updated successfully!');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()
            ->route('courses.index')
            ->with('success', 'Course deleted successfully!');
    }

    private function rules(?Course $course = null): array
    {
        return [
            'name' => 'required|string|max:255',

            'code' => [
                'required',
                'string',
                'max:20',
                Rule::unique('courses', 'code')->ignore($course?->id),
            ],

            'description' => 'nullable|string',
            'duration' => 'required|integer|min:1',
            'fee' => 'required|numeric|min:0',

            'difficulty' => [
                'required',
                Rule::in(['Easy', 'Medium', 'Hard']),
            ],

            'is_active' => 'nullable|boolean',
        ];
    }
}
