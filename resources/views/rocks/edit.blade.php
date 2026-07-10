@extends('layouts.app')

@section('title', 'Edit ' . $rock->name)

@section('content')
  <div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1 class="fw-bold">Edit {{ $rock->name }}</h1>
      <a href="{{ route('admin.rocks.show', $rock->id) }}" class="btn btn-secondary">
        Back to Rock
      </a>
    </div>
    <div class="card shadow-sm">
      <div class="card-body">
        <form action="{{ route('admin.rocks.update', $rock->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="row g-4">
            <div class="col-md-6">
              <label class="form-label fw-bold">Name</label>
              <input type="text" name="name" class="form-control" value="{{ $rock->name }}">
            </div>
            <div class="col-md-6">
              <label class="form-label fw-bold">Weight (g)</label>
              <input type="number" name="weight" class="form-control" value="{{ $rock->weight }}">
            </div>
            <div class="col-md-6">
              <label class="form-label fw-bold">Texture</label>
              <input type="text" name="texture" class="form-control" value="{{ $rock->texture }}">
            </div>
            <div class="col-md-6">
              <label class="form-label fw-bold">Color</label>
              <input type="text" name="color" class="form-control" value="{{ $rock->color }}">
            </div>

            <div class="col-md-6">
              <label class="form-label fw-bold">Type</label>
              <select name="type_id" class="form-select">
                <option value="">-- Select Type --</option>
                @foreach ($types as $type)
                  <option value="{{ $type->id }}" {{ $rock->type_id == $type->id ? 'selected' : '' }}>
                    {{ $type->name }}
                  </option>
                @endforeach
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-bold">Mood</label>
              <select name="mood_id" class="form-select">
                @foreach ($moods as $mood)
                  <option value="{{ $mood->id }}" {{ $rock->mood_id == $mood->id ? 'selected' : '' }}>
                    {{ $mood->name }}
                  </option>
                @endforeach
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-bold">Rarity</label>
              <select name="rarity_id" class="form-select">
                @foreach ($rarities as $rarity)
                  <option value="{{ $rarity->id }}" {{ $rock->rarity_id == $rarity->id ? 'selected' : '' }}>
                    {{ $rarity->name }}
                  </option>
                @endforeach
              </select>
            </div>
            <div class="col-md-12">
              <label class="form-label fw-bold">Skills</label>
              <div class="d-flex flex-wrap gap-3">
                @foreach ($skills as $skill)
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="skills[]" value="{{ $skill->id }}"
                      id="skill_{{ $skill->id }}" {{ $rock->skills->contains($skill->id) ? 'checked' : '' }}>
                    <label class="form-check-label" for="skill_{{ $skill->id }}">
                      {{ $skill->name }}
                    </label>
                  </div>
                @endforeach
              </div>
            </div>
            <div class="col-md-12">
              <label class="form-label fw-bold">Origin Story</label>
              <textarea name="origin_story" rows="4" class="form-control">{{ $rock->origin_story }}</textarea>
            </div>
            <!-- TODO: add image upload field  -->
            <div class="col-md-6">
              <label class="form-label fw-bold">Rock Image</label>
              @if ($rock->image_url)
                <div class="mb-2">
                  <img src="{{ '/storage/' . $rock->image_url }}" alt="{{ $rock->name }}"
                    class="img-fluid rounded shadow-sm" style="max-height: 180px; object-fit: cover;">
                </div>
              @endif
              <input type="file" name="image_url" class="form-control">
              <small class="text-muted">Upload a new image to replace the current one.</small>
            </div>

            <div class="col-md-6">
              <label class="form-label fw-bold">Adopted Status</label>
              <select name="adopted" class="form-select">
                <option value="0" {{ !$rock->adopted ? 'selected' : '' }}>Not Adopted</option>
                <option value="1" {{ $rock->adopted ? 'selected' : '' }}>Adopted</option>
              </select>
            </div>

          </div>
          <div class="mt-4 text-end">
            <button class="btn btn-primary px-4">Save Changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection