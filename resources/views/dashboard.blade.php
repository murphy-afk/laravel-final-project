@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center mt-4">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <!-- {{ __('You are logged in!') }} -->

                        <h1 class="fw-bold">Rock Adoption Center Admin Panel</h1>
                    </div>
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body py-4">
                            <h5 class="fw-bold mb-2">Manage Rocks</h5>
                            <p class="text-secondary">Create, edit, and organize pet rocks and attributes</p>
                            <a href="{{ route('admin.rocks.index') }}"
                                class="btn btn-outline-primary p-4 fw-bold mt-2 me-1">
                                Go to Rocks
                            </a>
                            <a href="{{ route('admin.rocks.create') }}"
                                class="btn btn-outline-success p-4 fw-bold mt-2 me-1">
                                Create New Rock
                            </a>
                            <a href="{{ route('admin.moods.index') }}" class="btn btn-outline-info p-4 fw-bold mt-2 me-1">
                                Moods
                            </a>
                            <a href="{{ route('admin.types.index') }}" class="btn btn-outline-secondary p-4 fw-bold mt-2 me-1">
                                Types
                            </a>
                            <a href="{{ route('admin.rarities.index') }}" class="btn btn-outline-dark p-4 fw-bold mt-2 me-1">
                                Rarities
                            </a>
                            <a href="" class="btn btn-outline-warning p-4 fw-bold mt-2">
                                Skills
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    >
@endsection