@extends('layouts/admin')
@section('content')
    <div class="row">
        <div class="col">
            <h1 class="display-2">
                {{ $course->name }}
            </h1>
            <p class="lead">{{ $course->description }}</p>
            @if($course->professor)
                <p class="text-muted">
                    <strong>Professor:</strong> 
                    <a href="{{ route('professors.show', $course->professor->id) }}" class="text-decoration-none">
                        {{ $course->professor->name }}
                    </a>
                </p>
            @else
                <p class="text-muted"><em>No professor assigned to this course</em></p>
            @endif
        </div>
        <div class="col-auto">
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Dashboard</a>
            <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning">Edit Course</a>
            <a href="{{ route('courses.index') }}" class="btn btn-info">Back to Courses</a>
        </div>
    </div>
    
    <div class="row mt-4">
        <div class="col">
            <h3>Enrolled Students ({{ $students->count() }})</h3>
            
            @if($students->count() > 0)
            <div class="row">
                @foreach($students as $student)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $student->fname }} {{ $student->lname }}</h5>
                            <p class="card-text">{{ $student->email }}</p>
                            <a href="{{ route('students.show', $student->id) }}" class="btn btn-sm btn-outline-primary">View Student</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="alert alert-info">
                <h4>No students enrolled</h4>
                <p>No students are currently enrolled in this course.</p>
            </div>
            @endif
        </div>
    </div>
@endsection
