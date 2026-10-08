@extends('layouts.app')

@section('title', 'Add Course')

@section('content')

<div class="page-header">

    <div>
        <h1>Add Course</h1>
        <p>Create a new course for the training institute.</p>
    </div>

    <a
        href="{{ route('courses.index') }}"
        class="btn btn-secondary"
    >
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

    <form
        action="{{ route('courses.store') }}"
        method="POST"
    >

        @csrf

        <div class="form-grid">

            <div class="form-group">

                <label for="name">
                    Course Name
                    <span class="required">*</span>
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
                    <div class="error-message">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="form-group">

                <label for="code">
                    Course Code
                    <span class="required">*</span>
                </label>

                <input
                    type="text"
                    id="code"
                    name="code"
                    value="{{ old('code') }}"
                    placeholder="e.g. WD101"
                    class="@error('code') input-error @enderror"
                    required
                >

                @error('code')
                    <div class="error-message">
                        {{ $message }}
                    </div>
                @enderror

            </div>

        </div>

        <div class="form-group">

            <label for="description">
                Description
            </label>

            <textarea
                id="description"
                name="description"
                rows="6"
                placeholder="Enter a brief description of the course..."
                class="@error('description') input-error @enderror"
            >{{ old('description') }}</textarea>

            @error('description')
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
                Create Course
            </button>

            <a
                href="{{ route('courses.index') }}"
                class="btn btn-secondary"
            >
                Cancel
            </a>

        </div>

    </form>

</div>

@endsection