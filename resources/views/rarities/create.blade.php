@extends('layouts.app')

@section('title', 'Add New Rarity')

@section('content')
  <div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1 class="fw-bold">Add New Rarity</h1>
      <a href="{{ route('admin.rarities.index') }}" class="btn btn-secondary">
        Back
      </a>
    </div>
    <div class="card bg-dark text-light border border-secondary shadow-sm">
      <div class="card-body">
        <form action="{{ route('admin.rarities.store') }}" method="POST">
          @csrf
          <div class="row g-4">
            <div class="col-md-6">
              <label class="form-label text-light">Rarity Name</label>
              <input type="text" name="name" class="form-control bg-light text-dark border-secondary"
                placeholder="e.g. Common, Rare, Legendary" required>
            </div>
            <div class="col-md-6">
              <label class="form-label text-light">Color Tag (primary, warning etc..)</label>
              <input type="text" name="color_tag" class="form-control bg-light text-dark border-secondary"
                placeholder="#a855f7" required>
            </div>
            <div class="col-md-6">
              <label class="form-label text-light">Price Multiplier</label>
              <input type="number" step="0.1" name="multiplier"
                class="form-control bg-light text-dark border-secondary" placeholder="e.g. 1.0, 1.5, 2.0" required>
            </div>
          </div>
          <div class="mt-4">
            <button class="btn btn-secondary px-4">Create Rarity</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection