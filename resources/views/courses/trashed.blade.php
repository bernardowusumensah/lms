@extends('layouts/admin')
@section('content')
    <div class="row">
        <div class="col">
            <h1 class="display-2">
                Trashed Courses
            </h1>
            <p class="lead">Courses that have been soft deleted</p>
        </div>
        <div class="col-auto">
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Dashboard</a>
            <a href="{{ route('courses.index') }}" class="btn btn-primary">Active Courses</a>
        </div>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    @if($courses->count() > 0)
    <div class="row">
        @foreach($courses as $course)
        <div class="col-md-4 mb-4">
            <div class="card border-warning">
                <div class="card-header bg-warning text-dark">
                    <h5 class="card-title mb-0">{{ $course->name }}</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ Str::limit($course->description, 100) }}</p>
                    <p class="text-muted small">
                        <i class="fa fa-trash"></i> Deleted: {{ $course->deleted_at->format('M d, Y') }}
                    </p>
                    
                    <div class="d-flex justify-content-between">
                        <form action="{{ route('courses.restore', $course->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success btn-sm">
                                <i class="fa fa-undo"></i> Restore
                            </button>
                        </form>
                        
                        <form action="{{ route('courses.forceDelete', $course->id) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Are you sure? This will permanently delete this course and cannot be undone!')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fa fa-times"></i> Delete Forever
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="alert alert-info">
        <h4>No trashed courses</h4>
        <p>There are no deleted courses to display.</p>
    </div>
    @endif
@endsection
