@extends('layouts/admin')
@section('content')
    <div class="row">
        <div class="col">
            <h1 class="display-2">
                {{ $professor->name }}
            </h1>
            <p class="lead">Professor Details</p>
        </div>
        <div class="col-auto">
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Dashboard</a>
            <a href="{{ route('professors.edit', $professor->id) }}" class="btn btn-warning">Edit Professor</a>
            <a href="{{ route('professors.index') }}" class="btn btn-info">Back to Professors</a>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Professor Information</h5>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">Name:</dt>
                        <dd class="col-sm-9">{{ $professor->name }}</dd>
                        
                        <dt class="col-sm-3">Courses Teaching:</dt>
                        <dd class="col-sm-9">{{ $professor->courses->count() }} course(s)</dd>
                        
                        <dt class="col-sm-3">Created:</dt>
                        <dd class="col-sm-9">{{ $professor->created_at->format('F j, Y \a\t g:i A') }}</dd>
                        
                        <dt class="col-sm-3">Last Updated:</dt>
                        <dd class="col-sm-9">{{ $professor->updated_at->format('F j, Y \a\t g:i A') }}</dd>
                    </dl>
                </div>
            </div>

            @if($professor->courses->count() > 0)
            <div class="card mt-3">
                <div class="card-header">
                    <h5 class="card-title mb-0">Courses Teaching</h5>
                </div>
                <div class="card-body">
                    @foreach($professor->courses as $course)
                    <div class="mb-2">
                        <strong>
                            <a href="{{ route('courses.show', $course->id) }}" class="text-decoration-none">
                                {{ $course->name }}
                            </a>
                        </strong>
                        <p class="text-muted small mb-1">{{ Str::limit($course->description, 100) }}</p>
                        <small class="text-muted">{{ $course->students->count() }} students enrolled</small>
                    </div>
                    @if(!$loop->last)<hr>@endif
                    @endforeach
                </div>
            </div>
            @endif
        </div>
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Actions</h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('professors.edit', $professor->id) }}" class="btn btn-warning">
                            <i class="fa fa-edit"></i> Edit Professor
                        </a>
                        
                        <form action="{{ route('professors.destroy', $professor->id) }}" method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this professor? This action cannot be undone.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100">
                                <i class="fa fa-trash"></i> Delete Professor
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
