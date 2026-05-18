@extends('layouts.app')

@section('title', 'Edit Skill')

@section('content')
  <div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1 class="fw-bold">Edit Skill</h1>
      <a href="{{ route('admin.skills.index') }}" class="btn btn-secondary">Back</a>
    </div>
    <div class="card bg-dark text-light border border-secondary shadow-sm">
      <div class="card-body">
        <form action="{{ route('admin.skills.update', $skill->id) }}" method="POST">
          @csrf
          @method('PUT')

          <div class="row g-4">
            <div class="col-md-6">
              <label class="form-label text-secondary">Skill Name</label>
              <input type="text" name="name" class="form-control bg-black text-light border-secondary"
                value="{{ $skill->name }}" required>
            </div>
            <div class="col-md-6">
              <label class="form-label text-secondary">Power Level</label>
              <input type="number" name="power_level" min="1" class="form-control bg-black text-light border-secondary"
                value="{{ $skill->power_level }}" required>
            </div>
            <div class="col-md-12">
              <label class="form-label text-secondary">Description (optional)</label>
              <textarea name="description" rows="4"
                class="form-control bg-black text-light border-secondary">{{ $skill->description }}</textarea>
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