@extends('layouts.app')

@section('title', 'Courses')

@section('content')

<div class="page-header">
    <div>
        <h1>Courses</h1>
        <p>Manage the courses available in the training institute.</p>
    </div>

    <a href="{{ route('courses.create') }}" class="btn btn-primary">
        + Add Course
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card">

    <div class="card-header">
        <div>
            <h2>All Courses</h2>
            <p>{{ $courses->count() }} course{{ $courses->count() == 1 ? '' : 's' }} available</p>
        </div>
    </div>

    @if($courses->count() > 0)

        <div class="table-wrapper">

            <table>

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Course Name</th>
                        <th>Code</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($courses as $course)

                        <tr>

                            <td>
                                <span class="table-id">
                                    #{{ $course->id }}
                                </span>
                            </td>

                            <td>
                                <strong>{{ $course->name }}</strong>
                            </td>

                            <td>
                                <span class="badge">
                                    {{ $course->code }}
                                </span>
                            </td>

                            <td>
                                <span class="description-cell">
                                    {{ $course->description ?? 'No description provided' }}
                                </span>
                            </td>

                            <td>

                                <div class="actions">

                                    <a
                                        href="{{ route('courses.show', $course) }}"
                                        class="btn btn-secondary btn-small"
                                    >
                                        View
                                    </a>

                                    <a
                                        href="{{ route('courses.edit', $course) }}"
                                        class="btn btn-primary btn-small"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('courses.destroy', $course) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this course?');"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-danger btn-small"
                                        >
                                            Delete
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    @else

        <div class="empty-state">

            <div class="empty-icon">
                📚
            </div>

            <h3>No Courses Yet</h3>

            <p>
                You haven't added any courses yet.
                Create your first course to get started.
            </p>

            <a
                href="{{ route('courses.create') }}"
                class="btn btn-primary"
            >
                + Add Your First Course
            </a>

        </div>

    @endif

</div>

@endsection