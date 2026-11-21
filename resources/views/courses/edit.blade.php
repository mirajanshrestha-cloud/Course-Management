
@extends('layouts.app')

@section('title', 'Edit Course')

@section('content')
<div class="container">
    <h1>Edit Course</h1>

    <form action="{{ route('courses.update', $course) }}" method="POST">
        @csrf
        @method('PUT')

        <x-form-input name="name" label="Course Name" :value="old('name', $course->name)" required />

        <x-form-input name="code" label="Course Code" :value="old('code', $course->code)" required />

        <x-form-input name="duration" label="Duration (Months)" type="number" :value="old('duration', $course->duration)" required />

        <x-form-input name="fee" label="Course Fee" type="number" :value="old('fee', $course->fee)" required />

        <div class="mb-3">
            <label for="difficulty" class="form-label">Difficulty</label>
            <select name="difficulty" id="difficulty" class="form-select" required>
                @foreach(['Easy', 'Medium', 'Hard'] as $level)
                    <option value="{{ $level }}" {{ old('difficulty', $course->difficulty) == $level ? 'selected' : '' }}>
                        {{ $level }}
                    </option>
                @endforeach
            </select>
            @error('difficulty')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4">{{ old('description', $course->description) }}</textarea>
            @error('description')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-check mb-3">
            <input
                type="checkbox"
                name="is_active"
                id="is_active"
                value="1"
                class="form-check-input"
                {{ old('is_active', $course->is_active) ? 'checked' : '' }}
            >
            <label for="is_active" class="form-check-label">Active Course</label>
        </div>

        <button type="submit" class="btn btn-primary">Update Course</button>

        <a href="{{ route('courses.show', $course) }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
