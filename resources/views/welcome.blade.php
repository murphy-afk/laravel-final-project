@extends('layouts.app')

@section('content')
    <div class="container py-5">

        <div class="mb-4">
            <h1 class="fw-bold">Dashboard</h1>
            <p class="text-light">Welcome back </p>
        </div>

        <div class="card shadow-sm border-0 h-100">
            <div class="card-body py-4">
                <h5 class="fw-bold mb-2">Manage Rocks</h5>
                <p class="text-secondary small">Create, edit, and organize the pet rocks</p>
                <a href="{{ route('admin.rocks.index') }}" class="btn btn-primary btn-sm mt-2">
                    Go to Rocks
                </a>
                <a href="{{ route('admin.rocks.create') }}" class="btn btn-primary btn-sm mt-2">
                    Create New Rock
                </a>
                <a href="" class="btn btn-primary btn-sm mt-2">
                    Go to Something Else
                </a>
            </div>

        </div>

    </div>
@endsection