@extends('layouts.app')

@section('title', 'Students')

@section('content')

<div class="page-header">

    <div>
        <h1>Students</h1>
        <p>Manage students enrolled in the training institute.</p>
    </div>

    <a
        href="{{ route('students.create') }}"
        class="btn btn-primary"
    >
        + Add Student
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
            <h2>All Students</h2>

            <p>
                {{ $students->count() }}
                student{{ $students->count() == 1 ? '' : 's' }}
                registered
            </p>
        </div>

    </div>

    @if($students->count() > 0)

        <div class="table-wrapper">

            <table>

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Date of Birth</th>
                        <th>Course</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($students as $student)

                        <tr>

                            <td>
                                <span class="table-id">
                                    #{{ $student->id }}
                                </span>
                            </td>

                            <td>
                                <strong>
                                    {{ $student->name }}
                                </strong>
                            </td>

                            <td>
                                {{ $student->email }}
                            </td>

                            <td>
                                {{ $student->phone ?? 'Not provided' }}
                            </td>

                            <td>
                                {{ $student->date_of_birth?->format('d M Y') ?? 'Not provided' }}
                            </td>

                            <td>
                                @if($student->course)
                                    <span class="badge">
                                        {{ $student->course->name }}
                                    </span>
                                @else
                                    <span class="muted">
                                        No course
                                    </span>
                                @endif
                            </td>

                            <td>

                                <div class="actions">

                                    <a
                                        href="{{ route('students.show', $student) }}"
                                        class="btn btn-secondary btn-small"
                                    >
                                        View
                                    </a>

                                    <a
                                        href="{{ route('students.edit', $student) }}"
                                        class="btn btn-primary btn-small"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('students.destroy', $student) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this student?');"
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

            <h3>No Students Yet</h3>

            <p>
                You haven't added any students yet.
                Register your first student to get started.
            </p>

            <a
                href="{{ route('students.create') }}"
                class="btn btn-primary"
            >
                Add Your First Student
            </a>

        </div>

    @endif

</div>

@endsection