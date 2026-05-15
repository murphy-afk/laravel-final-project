@extends('layouts.app')

@section('title', 'Add New Mood')

@section('content')
  <div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1 class="fw-bold">Add New Mood</h1>
      <a href="{{ route('admin.moods.index') }}" class="btn btn-secondary">Back</a>
    </div>
    <div class="card bg-dark text-light border border-secondary shadow-sm">
      <div class="card-body">
        <form action="{{ route('admin.moods.store') }}" method="POST">
          @csrf
          <div class="row g-4">
            <div class="col-md-6">
              <label class="form-label text-light">Mood Name</label>
              <input type="text" name="name" class="form-control bg-light text-dark border-secondary"
                placeholder="e.g. Grumpy, Sleepy, Chaotic Neutral" required>
            </div>
            <div class="col-md-12">
              <label class="form-label text-light">Description</label>
              <textarea name="description" class="form-control bg-light text-dark border-secondary" rows="4"
                placeholder="Optional: describe the mood's vibe or behavior"></textarea>
            </div>
          </div>
          <div class="mt-4">
            <button class="btn btn-secondary px-4">Create Mood</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection