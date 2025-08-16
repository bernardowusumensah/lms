@extends('layouts/admin')
@section('content')
    <div class="row mb-3">
        <div class="col">
            <h1 class="display-2">
                Trashed Students
            </h1>
        </div>
        <div class="col text-end">
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Dashboard</a>
            <a href="{{ route('students.index') }}" class="btn btn-info">Back to Students</a>
        </div>
    </div>
    <div class="row">
        @foreach($students as $student)
        <div class="col-md-4  mb-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $student -> fname }} {{ $student -> lname }}</h5>
                    <p class="card-text">{{ $student -> email }}</p>
                    <a href="{{ route('students.restore', $student -> id ) }}" class="card-link">Restore</a>
                    <a href="{{ route('students.destroy', $student -> id )}}" class="card-link text-danger">Delete Permanently</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
