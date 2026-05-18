@extends('layouts.app')

@section('tutle', 'Create Rock Type')

@section('content')
  <div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1 class="fw-bold">Add New Rock Type</h1>
      <a href="{{ route('admin.types.index') }}" class="btn btn-secondary">
        Back
      </a>
    </div>
    <div class="card bg-dark text-light border border-secondary shadow-sm">
      <div class="card-body">
        <form action="{{ route('admin.types.store') }}" method="POST">
          @csrf
          <div class="row g-4">
            <div class="col-md-6">
              <label class="form-label text-light">Rock Type Name</label>
              <input type="text" name="name" class="form-control bg-light text-dark border-secondary"
                placeholder="e.g. Common, Rare, Legendary" required>
            </div>
            <div class="col-md-6">
              <label class="form-label text-light">Description</label>
              <input type="text" name="description" class="form-control bg-light text-dark border-secondary"
                placeholder="chaos rock" required>
            </div>
          </div>
          <div class="mt-4">
            <button class="btn btn-secondary px-4">Create Rock Type</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection