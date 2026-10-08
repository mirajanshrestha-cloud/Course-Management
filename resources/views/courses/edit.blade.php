@extends('layouts.app')

@section('title', 'Edit Course')

@section('content')

<div class="page-header">

    <div>
        <h1>Edit Course</h1>
        <p>Update the information for this course.</p>
    </div>

    <a
        href="{{ route('courses.show', $course) }}"
        class="btn btn-secondary"
    >
        View Course
    </a>

</div>

<div class="card form-card">

    <div class="card-header">

        <div>
            <h2>Course Information</h2>
            <p>Update the course details below.</p>
        </div>

        <span class="badge">
            #{{ $course->id }}
        </span>

    </div>

    <form
        action="{{ route('courses.update', $course) }}"
        method="POST"
    >

        @csrf
        @method('PUT')

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
                    value="{{ old('name', $course->name) }}"
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
                    value="{{ old('code', $course->code) }}"
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
            >{{ old('description', $course->description) }}</textarea>

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
                Save Changes
            </button>

            <a
                href="{{ route('courses.show', $course) }}"
                class="btn btn-secondary"
            >
                Cancel
            </a>

        </div>

    </form>

</div>

@endsection