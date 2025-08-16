@extends('layouts/admin')
@section('content')
    <div class="row">
        <div class="col">
            <h1 class="display-2">
                View all Courses
            </h1>
        </div>
        <div class="col-auto">
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
            <a href="{{ route('courses.create') }}" class="btn btn-primary">Add New Course</a>
        </div>
    </div>
    
    @if($courses->count() > 0)
    <div class="row mt-4">
        @foreach($courses as $course)
        <div class="col-md-4 mb-3">
            <div class="card h-100">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $course->name }}</h5>
                    <p class="card-text flex-grow-1">{{ Str::limit($course->description, 100) }}</p>
                    <div class="mt-auto">
                        <small class="text-muted">
                            {{ $course->students->count() }} students enrolled<br>
                            @if($course->professor)
                                <strong>Professor:</strong> {{ $course->professor->name }}
                            @else
                                <em>No professor assigned</em>
                            @endif
                        </small>
                        <div class="mt-2">
                            <a href="{{ route('courses.show', $course->id) }}" class="btn btn-sm btn-info">View</a>
                            <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <a href="{{ route('courses.trash', $course->id) }}" class="btn btn-sm btn-danger" 
                               onclick="return confirm('Are you sure you want to delete this course?')">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="alert alert-info mt-4">
        <h4>No courses found</h4>
        <p>Start by <a href="{{ route('courses.create') }}">creating your first course</a>.</p>
    </div>
    @endif
@endsection
