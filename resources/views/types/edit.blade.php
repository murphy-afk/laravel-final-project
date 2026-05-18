@extends('layouts.app')

@section('title', 'Edit Rock Type')

@section('content')
   <div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1 class="fw-bold">Edit Type</h1>
      <a href="{{ route('admin.types.index') }}" class="btn btn-secondary">
        Back
      </a>
    </div>
    <div class="card bg-dark text-light border border-secondary shadow-sm">
      <div class="card-body">
        <form action="{{ route('admin.types.update', $type->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="row g-4">
            <div class="col-md-6">
              <label class="form-label text-secondary">Type Name</label>
              <input type="text" name="name" class="form-control bg-black text-light border-secondary"
                value="{{ $type->name }}" required>
            </div>
            <div class="col-md-6">
              <label class="form-label text-secondary">Description</label>
              <input type="text" name="description" class="form-control bg-black text-light border-secondary"
                value="{{ $type->description }}" placeholder="#a855f7" required>
            </div>
          </div>
          <div class="mt-4">
            <button class="btn btn-secondary px-4">Save Changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection