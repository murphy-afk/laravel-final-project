@extends('layouts.app')

@section('title', $rock->name)

@section('content')
  <div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1 class="fw-bold">{{ $rock->name }}</h1>
      <div>
        <a href="{{ route('admin.rocks.index') }}" class="btn btn-secondary me-2">Back</a>
        <a href="{{ route('admin.rocks.edit', $rock->id) }}" class="btn btn-primary me-2">Edit</a>
        <form action="{{ route('admin.rocks.destroy', $rock->id) }}" method="POST" class="d-inline">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger" onclick="return confirm('Delete this rock?')">
            Delete
          </button>
        </form>
      </div>
    </div>
    <div class="card shadow-sm mb-4">
      <div class="row g-0">
        <div class="col-md-4">
          <img
            src="{{ $rock->image_url == null ? asset('storage/img/placeholder.jpg') : asset('storage/' . $rock->image_url) }}"
            class="img-fluid rounded rock-image my-5 mx-1" alt="{{ $rock->name }}">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h4 class="fw-bold mb-3">Rock Details</h4>
            <div class="row row-cols-1 row-cols-md-2 g-3">
              <div class="col">
                <span class="text-secondary ">Weight</span>
                <p class="fw-bold mb-0">{{ $rock->weight }} g</p>
              </div>
              <div class="col">
                <span class="text-secondary ">Texture</span>
                <p class="fw-bold mb-0">{{ $rock->texture }}</p>
              </div>
              <div class="col">
                <span class="text-secondary ">Color</span>
                <p class="fw-bold mb-0">{{ $rock->color }}</p>
              </div>
              <div class="col">
                <span class="text-secondary ">Mood</span>
                <p class="fw-bold mb-0">{{ $rock->mood?->name }}</p>
              </div>
              <div class="col">
                <span class="text-secondary ">Rarity</span>
                <p class="fw-bold mb-0">{{ $rock->rarity?->name }}</p>
              </div>
              <div class="col">
                <span class="text-secondary ">Type</span>
                <p class="fw-bold mb-0">
                  {{ $rock->type?->name ?? 'No type assigned' }}
                </p>
              </div>
              <div class="col">
                <span class="text-secondary ">Skills</span>
                <p class="fw-bold mb-0">
                  @if($rock->skills->count())
                    @foreach ($rock->skills as $skill)
                      <span class="me-1">-{{ $skill->name }}</span>
                    @endforeach
                  @else
                    <span class="text-muted">None</span>
                  @endif
                </p>
              </div>
            </div>
            <div class="mt-4">
              <span class="text-secondary ">Origin Story</span>
              <p class="fw-bold mb-0">{{ $rock->origin_story }}</p>
            </div>
            <div class="mt-4">
              <span class="text-secondary">Adopted status</span>
              <p class="fw-bold mb-0">{{ $rock->adopted ? 'Adopted' : 'Not Adopted' }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
@endsection