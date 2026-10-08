@extends('layouts.app')

@section('title', 'Add Student')

@section('content')

<div class="page-header">
    <div>
        <h1>Add Student</h1>
        <p>Register a new student in the training institute.</p>
    </div>

    <a href="{{ route('students.index') }}" class="btn btn-secondary">
        Back to Students
    </a>
</div>

<div class="card form-card">

    <div class="card-header">
        <div>
            <h2>Student Information</h2>
            <p>Enter the student's details below.</p>
        </div>
    </div>

    <form action="{{ route('students.store') }}" method="POST">
        @csrf

        <div class="form-grid">

            <div class="form-group">
                <label for="name">
                    Student Name
                    <span class="required">*</span>
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="e.g. John Smith"
                    class="@error('name') input-error @enderror"
                    required
                >

                @error('name')
                    <div class="error-message">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">
                    Email Address
                    <span class="required">*</span>
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="e.g. john@example.com"
                    class="@error('email') input-error @enderror"
                    required
                >

                @error('email')
                    <div class="error-message">
                        {{ $message }}
                    </div>
                @enderror
            </div>

        </div>

        <div class="form-grid">

            <div class="form-group">
                <label for="phone">
                    Phone Number
                </label>

                <input
                    type="text"
                    id="phone"
                    name="phone"
                    value="{{ old('phone') }}"
                    placeholder="e.g. 98XXXXXXXX"
                    class="@error('phone') input-error @enderror"
                >

                @error('phone')
                    <div class="error-message">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="date_of_birth">
                    Date of Birth
                </label>

                <input
                    type="date"
                    id="date_of_birth"
                    name="date_of_birth"
                    value="{{ old('date_of_birth') }}"
                    class="@error('date_of_birth') input-error @enderror"
                >

                @error('date_of_birth')
                    <div class="error-message">
                        {{ $message }}
                    </div>
                @enderror
            </div>

        </div>

        <div class="form-group">

            <label for="course_id">
                Course
                <span class="required">*</span>
            </label>

            <select
                id="course_id"
                name="course_id"
                class="@error('course_id') input-error @enderror"
                required
            >
                <option value="">Select Course</option>

                @foreach($courses as $course)
                    <option
                        value="{{ $course->id }}"
                        {{ old('course_id') == $course->id ? 'selected' : '' }}
                    >
                        {{ $course->name }} ({{ $course->code }})
                    </option>
                @endforeach

            </select>

            @error('course_id')
                <div class="error-message">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <div class="form-actions">

            <button
                type="submit"
                class="btn btn-primary"
            >
                Create Student
            </button>

            <a
                href="{{ route('students.index') }}"
                class="btn btn-secondary"
            >
                Cancel
            </a>

        </div>

    </form>

</div>

@endsection