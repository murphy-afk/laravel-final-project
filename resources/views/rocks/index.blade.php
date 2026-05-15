@extends('layouts.app')

@section('title', 'All Pet Rocks')

@section('content')
  <div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1 class="fw-bold">All Pet Rocks</h1>
      <a href="{{ route('admin.rocks.create') }}" class="btn btn-primary">Add a new rock</a>
    </div>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
      @foreach ($rocks as $rock)
        <div class="col">
          <div class="card bg-dark text-light border border-secondary rounded-0 shadow rock-card h-100">
            <div class="card-body">
              <h5 class="card-title fw-bold fs-2">{{ $rock->name }}</h5>
              <p class="badge px-3 py-2 fs-6" style="background: linear-gradient(45deg, #a855f7, #ec4899);">
                {{ $rock->rarity->name }}
              </p>
              <p class="fw-bold fs-4 text-success">
                €{{ number_format($rock->price, 2) }}
              </p>
              <p class="text-secondary small mb-5">{{ $rock->origin_story }}</p>
              <div class="row small mb-5">
                <div class="col">
                  <span class="text-secondary">Type</span><br>
                  <span class="fw-bold">{{ $rock->type->name }}</span>
                </div>
                <div class="col">
                  <span class="text-secondary">Mood</span><br>
                  <span class="fw-bold">{{ $rock->mood->name }}</span>
                </div>
                <div class="col">
                  <span class="text-secondary">Weight</span><br>
                  <span class="fw-bold">{{ $rock->weight }} g</span>
                </div>
              </div>
              <div class="mb-5">
                <span class="text-secondary">Skills:</span>
                @foreach ($rock->skills as $skill)
                  <span class="text-bg-light badge">{{ $skill->name }}</span>
                @endforeach
              </div>
              <div class="d-flex justify-content-start gap-2 mt-3">
                <a href="{{ route('admin.rocks.show', $rock->id) }}" class="btn btn-outline-light">View</a>
                <a href="{{ route('admin.rocks.edit', $rock->id) }}" class="btn btn-outline-warning">Edit</a>
                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteRockModal-{{ $rock->id }}">
                  Delete
                </button>
                <div class="modal fade" id="deleteRockModal-{{ $rock->id }}" tabindex="-1" aria-labelledby="deleteRockModalLabel-{{ $rock->id }}" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="deleteRockModalLabel-{{ $rock->id }}">
                          Delete {{ $rock->name }}
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        This action cannot be undone.
                        Are you sure you want to delete {{ $rock->name }}?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                          Close
                        </button>
                        <form action="{{ route('admin.rocks.destroy', $rock->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-outline-danger btn-sm">
                            Delete
                          </button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection