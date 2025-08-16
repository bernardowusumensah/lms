@extends('layouts/admin')
@section('content')
    <div class="row">
        <div class="col">
            <h1 class="display-2">
                Professors
            </h1>
            <p class="lead">Manage system professors</p>
        </div>
        <div class="col-auto">
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
            <a href="{{ route('professors.create') }}" class="btn btn-primary">Add Professor</a>
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
    
    @if($professors->count() > 0)
    <div class="row">
        @foreach($professors as $professor)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">{{ $professor->name }}</h5>
                </div>
                <div class="card-body">
                    <p class="text-muted small">
                        <i class="fa fa-calendar"></i> Created: {{ $professor->created_at->format('M d, Y') }}
                    </p>
                    
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('professors.show', $professor->id) }}" class="btn btn-outline-primary btn-sm">
                            <i class="fa fa-eye"></i> View
                        </a>
                        <a href="{{ route('professors.edit', $professor->id) }}" class="btn btn-warning btn-sm">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('professors.destroy', $professor->id) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Are you sure you want to delete this professor?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
    <div class="row">
        <div class="col">
            {{ $professors->links() }}
        </div>
    </div>
    @else
    <div class="alert alert-info">
        <h4>No professors found</h4>
        <p>No professors are currently in the system. <a href="{{ route('professors.create') }}">Add the first professor</a>.</p>
    </div>
    @endif
@endsection
