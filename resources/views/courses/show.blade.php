@extends('layouts.app')

@section('title', $course->name)

@section('content')

<div class="page-header">

    <div>
        <div class="breadcrumb">
            Courses / {{ $course->code }}
        </div>

        <h1>{{ $course->name }}</h1>

        <p>
            Course details and information.
        </p>
    </div>

    <div class="actions">

        <a
            href="{{ route('courses.edit', $course) }}"
            class="btn btn-primary"
        >
            Edit Course
        </a>

        <a
            href="{{ route('courses.index') }}"
            class="btn btn-secondary"
        >
            Back
        </a>

    </div>

</div>

<div class="details-grid">

    <div class="card">

        <div class="card-header">
            <div>
                <h2>Course Details</h2>
                <p>Information about this course.</p>
            </div>
        </div>

        <div class="details-list">

            <div class="detail-item">
                <span class="detail-label">Course ID</span>
                <span class="detail-value">#{{ $course->id }}</span>
            </div>

            <div class="detail-item">
                <span class="detail-label">Course Name</span>
                <span class="detail-value">
                    {{ $course->name }}
                </span>
            </div>

            <div class="detail-item">
                <span class="detail-label">Course Code</span>
                <span class="detail-value">
                    <span class="badge">
                        {{ $course->code }}
                    </span>
                </span>
            </div>

            <div class="detail-item">
                <span class="detail-label">Created</span>
                <span class="detail-value">
                    {{ $course->created_at->format('d M Y') }}
                </span>
            </div>

            <div class="detail-item">
                <span class="detail-label">Last Updated</span>
                <span class="detail-value">
                    {{ $course->updated_at->format('d M Y') }}
                </span>
            </div>

        </div>

    </div>

    <div class="card">

        <div class="card-header">
            <div>
                <h2>Description</h2>
                <p>Course overview.</p>
            </div>
        </div>

        <div class="description-box">

            @if($course->description)

                <p>
                    {{ $course->description }}
                </p>

            @else

                <p class="muted">
                    No description has been added for this course.
                </p>

            @endif

        </div>

    </div>

</div>

<div class="card danger-card">

    <div>

        <h2>Delete Course</h2>

        <p>
            Deleting this course will permanently remove it from the system.
        </p>

    </div>

    <form
        action="{{ route('courses.destroy', $course) }}"
        method="POST"
        onsubmit="return confirm('Are you sure you want to delete this course?');"
    >

        @csrf
        @method('DELETE')

        <button
            type="submit"
            class="btn btn-danger"
        >
            Delete Course
        </button>

    </form>

</div>

@endsection