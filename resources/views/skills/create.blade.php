@extends('layouts.app')

@section('title', 'Add Skill')

@section('content')
  <div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1 class="fw-bold">Add New Skill</h1>
      <a href="{{ route('admin.skills.index') }}" class="btn btn-secondary">
        Back
      </a>
    </div>
    <div class="card bg-dark text-light border border-secondary shadow-sm">
      <div class="card-body">
        <form action="{{ route('admin.skills.store') }}" method="POST">
          @csrf
          <div class="row g-4">
            <div class="col-md-6">
              <label class="form-label text-light">Skill Name</label>
              <input type="text" name="name" class="form-control bg-light text-dark border-secondary"
                placeholder="e.g. Common, Rare, Legendary" required>
            </div>
            <div class="col-md-6">
              <label class="form-label text-secondary">Power Level</label>
              <input type="number" name="power_level" min="1" class="form-control bg-light text-dark border-secondary"
                required>
            </div>
            <div class="col-md-6">
              <label class="form-label text-light">Description</label>
              <input type="text" name="description" class="form-control bg-light text-dark border-secondary"
                placeholder="chaos rock" required>
            </div>
          </div>
          <div class="mt-4">
            <button class="btn btn-secondary px-4">Create Skill</button>
          </div>
        </form>
      </div>
    </div>
  </div>


@endsection