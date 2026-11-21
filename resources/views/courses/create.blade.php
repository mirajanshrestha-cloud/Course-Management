
@extends('layouts.app')

@section('title', 'Add Course')

@section('content')

<div class="page-header">
    <div>
        <h1>Add Course</h1>
        <p>Create a new course for the training institute.</p>
    </div>

    <a href="{{ route('courses.index') }}" class="btn btn-secondary">
        Back to Courses
    </a>
</div>

<div class="card form-card">

    <div class="card-header">
        <div>
            <h2>Course Information</h2>
            <p>Enter the details of the new course below.</p>
        </div>
    </div>

    <form action="{{ route('courses.store') }}" method="POST">
        @csrf

        <div class="form-grid">

            <div class="form-group">
                <label for="name">
                    Course Name <span class="required">*</span>
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="e.g. Web Development"
                    class="@error('name') input-error @enderror"
                    required
                >

                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="code">
                    Course Code <span class="required">*</span>
                </label>

                <input
                    type="text"
                    id="code"
                    name="code"
                    value="{{ old('code') }}"
                    placeholder="e.g. WEB001"
                    class="@error('code') input-error @enderror"
                    required
                >

                @error('code')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="duration">
                    Duration (Months) <span class="required">*</span>
                </label>

                <input
                    type="number"
                    id="duration"
                    name="duration"
                    value="{{ old('duration') }}"
                    placeholder="e.g. 3"
                    min="1"
                    class="@error('duration') input-error @enderror"
                    required
                >

                @error('duration')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="fee">
                    Course Fee <span class="required">*</span>
                </label>

                <input
                    type="number"
                    id="fee"
                    name="fee"
                    value="{{ old('fee') }}"
                    placeholder="e.g. 15000"
                    min="0"
                    step="0.01"
                    class="@error('fee') input-error @enderror"
                    required
                >

                @error('fee')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="difficulty">
                    Difficulty <span class="required">*</span>
                </label>

                <select
                    id="difficulty"
                    name="difficulty"
                    class="@error('difficulty') input-error @enderror"
                    required
                >
                    <option value="">Select difficulty</option>

                    <option value="Easy" {{ old('difficulty') == 'Easy' ? 'selected' : '' }}>
                        Easy
                    </option>

                    <option value="Medium" {{ old('difficulty') == 'Medium' ? 'selected' : '' }}>
                        Medium
                    </option>

                    <option value="Hard" {{ old('difficulty') == 'Hard' ? 'selected' : '' }}>
                        Hard
                    </option>
                </select>

                @error('difficulty')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

        </div>

        <div class="form-group">
            <label for="description">Description</label>

            <textarea
                id="description"
                name="description"
                rows="6"
                placeholder="Enter a brief description of the course..."
                class="@error('description') input-error @enderror"
            >{{ old('description') }}</textarea>

            @error('description')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>
                <input
                    type="checkbox"
                    name="is_active"
                    value="1"
                    {{ old('is_active', 1) ? 'checked' : '' }}
                >
                Active Course
            </label>

            @error('is_active')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                Create Course
            </button>

            <a href="{{ route('courses.index') }}" class="btn btn-secondary">
                Cancel
            </a>
        </div>

    </form>

</div>

@endsection
