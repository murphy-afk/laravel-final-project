@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-dark my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <!-- {{ __('You are logged in!') }} -->
                    <a href={{ route('admin.rocks.index') }} class="btn btn-primary">All Rocks</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
