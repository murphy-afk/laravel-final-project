@extends('layouts.app')

@section('title', 'Edit Rarity')

@section('content')
  <div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1 class="fw-bold">Edit Rarity</h1>
      <a href="{{ route('admin.rarities.index') }}" class="btn btn-secondary">
        Back
      </a>
    </div>
    <div class="card bg-dark text-light border border-secondary shadow-sm">
      <div class="card-body">
        <form action="{{ route('admin.rarities.update', $rarity->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="row g-4">
            <div class="col-md-6">
              <label class="form-label text-secondary">Rarity Name</label>
              <input type="text" name="name" class="form-control bg-black text-light border-secondary"
                value="{{ $rarity->name }}" required>
            </div>
            <div class="col-md-6">
              <label class="form-label text-secondary">Color Tag (Hex)</label>
              <input type="text" name="color_tag" class="form-control bg-black text-light border-secondary"
                value="{{ $rarity->color_tag }}" placeholder="#a855f7" required>
            </div>
            <div class="col-md-6">
              <label class="form-label text-secondary">Price Multiplier</label>
              <input type="number" step="0.1" name="multiplier"
                class="form-control bg-black text-light border-secondary"
                value="{{ $rarity->multiplier }}" required>
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