@extends('layouts.app')

@section('title', 'All Pet Rocks')

@section('content')

  <div class="container py-5">

    <form method="GET" action="{{ route('admin.rocks.index') }}"
      class="card bg-dark text-light border border-secondary p-3 mb-4">

      <div class="row g-3">

        <div class="col-md-3">
          <label class="form-label text-secondary">Name</label>
          <input type="text" name="name" class="form-control bg-light text-dark border-secondary"
            value="{{ request('name') }}" placeholder="Search by name">
        </div>

        <div class="col-md-3">
          <label class="form-label text-secondary">Type</label>
          <select name="type_id" class="form-select bg-light text-dark border-secondary">
            <option value="">All Types</option>
            @foreach ($types as $type)
              <option value="{{ $type->id }}" {{ request('type_id') == $type->id ? 'selected' : '' }}>
                {{ $type->name }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="col-md-3">
          <label class="form-label text-secondary">Mood</label>
          <select name="mood_id" class="form-select bg-light text-dark border-secondary">
            <option value="">All Moods</option>
            @foreach ($moods as $mood)
              <option value="{{ $mood->id }}" {{ request('mood_id') == $mood->id ? 'selected' : '' }}>
                {{ $mood->name }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="col-md-3">
          <label class="form-label text-secondary">Skill</label>
          <select name="skill_id" class="form-select bg-light text-dark border-secondary">
            <option value="">All Skills</option>
            @foreach ($skills as $skill)
              <option value="{{ $skill->id }}" {{ request('skill_id') == $skill->id ? 'selected' : '' }}>
                {{ $skill->name }}
              </option>
            @endforeach
          </select>
        </div>

      </div>

      <div class="mt-3 d-flex gap-2">
        <button class="btn btn-light">Filter</button>
        <a href="{{ route('admin.rocks.index') }}" class="btn btn-secondary">Reset</a>
      </div>

    </form>
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1 class="fw-bold">All Pet Rocks</h1>
      <a href="{{ route('admin.rocks.create') }}" class="btn btn-secondary">Add a new rock</a>
    </div>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
      @foreach ($rocks as $rock)
        <div class="col-md-4 mb-4">
          <div class="card h-100 border-dark bg-dark text-light">

            <img src="{{ $rock->image_url == null ? asset('storage/img/placeholder.jpg') : asset('storage/' . $rock->image_url) }}"
            class="card-img-top rock-card-img"
              alt="{{ $rock->name }}">

            <div class="card-body">
              <h5 class="fw-bold mb-2">{{ $rock->name }}</h5>

              <div class="mb-2">
                <span class="d-block"><strong>Type:</strong> {{ $rock->type?->name }}</span>
                <span class="d-block"><strong>Mood:</strong> {{ $rock->mood?->name }}</span>
                <span class="d-block"><strong>Rarity:</strong> {{ $rock->rarity?->name }}</span>
              </div>

              <div class="mb-2">
                <span class="d-block"><strong>Weight:</strong> {{ $rock->weight }} g</span>
                <span class="d-block"><strong>Texture:</strong> {{ $rock->texture }}</span>
                <span class="d-block"><strong>Color:</strong> {{ $rock->color }}</span>
              </div>

              <div class="mb-2">
                <strong>Skills:</strong>
                @if($rock->skills->count())
                  <div class="mt-1">
                    @foreach($rock->skills as $skill)
                      <span class="badge bg-light text-dark me-1">{{ $skill->name }}</span>
                    @endforeach
                  </div>
                @else
                  <span class="text-muted">None</span>
                @endif
              </div>

              <p class="text-light small mt-2">
              <strong>Origin Story: </strong> <br>{{ Str::limit($rock->origin_story, 80) }}</p>
            </div>

            <div class="card-footer bg-dark border-0 d-flex justify-content-between">
              <a href="{{ route('admin.rocks.edit', $rock->id) }}" class="btn btn-sm btn-outline-warning">Edit</a>
              <a href="{{ route('admin.rocks.show', $rock->id) }}" class="btn btn-sm btn-outline-light">View</a>

              <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                data-bs-target="#deleteModal-{{ $rock->id }}">
                Delete
              </button>
            </div>
          </div>
        </div>

        <div class="modal fade" id="deleteModal-{{ $rock->id }}" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">

              <div class="modal-header">
                <h5 class="modal-title">Delete Rock</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>

              <div class="modal-body">
                Are you sure you want to delete <strong>{{ $rock->name }}</strong>?
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                <form action="{{ route('admin.rocks.destroy', $rock->id) }}" method="POST" class="m-0 p-0 d-inline-block">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">Confirm Delete</button>
                </form>
              </div>

            </div>
          </div>
        </div>

      @endforeach
    </div>
  </div>
@endsection