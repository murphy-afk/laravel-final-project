@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 70vh;">
    <div class="text-center">
        <h1 class="fw-bold mb-3">Welcome</h1>
        <p class="text-light fs-5 mb-4">Please log in to access the Pet Rock Admin Panel</p>
        <a href="{{ route('login') }}" class="btn btn-secondary px-4 py-2">
            Log In
        </a>
    </div>
</div>
@endsection
