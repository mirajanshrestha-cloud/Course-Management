@extends('layouts.app')

@section('title', $student->name)

@section('content')

<div class="page-header">

    <div>
        <div class="breadcrumb">
            Students / {{ $student->id }}
        </div>

        <h1>{{ $student->name }}</h1>

        <p>Student details and information.</p>
    </div>

    <div class="actions">

        <a
            href="{{ route('students.edit', $student) }}"
            class="btn btn-primary"
        >
            Edit Student
        </a>

        <a
            href="{{ route('students.index') }}"
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
                <h2>Student Details</h2>
                <p>Personal information about this student.</p>
            </div>

        </div>

        <div class="details-list">

            <div class="detail-item">

                <span class="detail-label">
                    Student ID
                </span>

                <span class="detail-value">
                    #{{ $student->id }}
                </span>

            </div>

            <div class="detail-item">

                <span class="detail-label">
                    Name
                </span>

                <span class="detail-value">
                    {{ $student->name }}
                </span>

            </div>

            <div class="detail-item">

                <span class="detail-label">
                    Email
                </span>

                <span class="detail-value">
                    {{ $student->email }}
                </span>

            </div>

            <div class="detail-item">

                <span class="detail-label">
                    Phone
                </span>

                <span class="detail-value">
                    {{ $student->phone ?? 'Not provided' }}
                </span>

            </div>

            <div class="detail-item">

                <span class="detail-label">
                    Date of Birth
                </span>

                <span class="detail-value">
                    {{ $student->date_of_birth?->format('d M Y') ?? 'Not provided' }}
                </span>

            </div>

            <div class="detail-item">

                <span class="detail-label">
                    Course
                </span>

                <span class="detail-value">

                    @if($student->course)

                        <span class="badge">
                            {{ $student->course->name }}
                        </span>

                    @else

                        <span class="muted">
                            No course assigned
                        </span>

                    @endif

                </span>

            </div>

        </div>

    </div>

    <div class="card">

        <div class="card-header">

            <div>
                <h2>Course Information</h2>
                <p>Course currently assigned to this student.</p>
            </div>

        </div>

        @if($student->course)

            <div class="description-box">

                <p>
                    <strong>{{ $student->course->name }}</strong>
                </p>

                <p style="margin-top: 8px;">
                    Course Code:
                    <strong>{{ $student->course->code }}</strong>
                </p>

                @if($student->course->description)

                    <p style="margin-top: 12px;">
                        {{ $student->course->description }}
                    </p>

                @endif

            </div>

        @else

            <div class="description-box">

                <p class="muted">
                    No course has been assigned to this student.
                </p>

            </div>

        @endif

    </div>

</div>

<div class="card danger-card">

    <div>

        <h2>Delete Student</h2>

        <p>
            Deleting this student will permanently remove their
            information from the system.
        </p>

    </div>

    <form
        action="{{ route('students.destroy', $student) }}"
        method="POST"
        onsubmit="return confirm('Are you sure you want to delete this student?');"
    >

        @csrf
        @method('DELETE')

        <button
            type="submit"
            class="btn btn-danger"
        >
            Delete Student
        </button>

    </form>

</div>

@endsection