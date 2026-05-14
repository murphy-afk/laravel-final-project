@extends('layouts.rocks')

@section('title', 'New Pet Rock')

@section('content')
  <div class="container py-5">

    <div class="mb-4">
      <h1 class="fw-bold text-light">Add a New Rock</h1>
    </div>

    <div class="card shadow-lg border-0 rounded-0">
      <div class="card-body p-4">

        <form action="{{ route('admin.rocks.store') }}" method="POST">
          @csrf

          <div class="row g-4">
            <div class="col-md-6">
              <label class="form-label fw-bold">Rock Name</label>
              <input type="text" name="name" class="form-control" placeholder="Sir Pebbleton" required>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-bold">Weight (grams)</label>
              <input type="number" name="weight" class="form-control" placeholder="320" required min="0">
            </div>
            <div class="col-md-4">
              <label class="form-label fw-bold">Type</label>
              <select name="type_id" class="form-select" required>
                <option value="">Choose type...</option>
                @foreach ($types as $type)
                  <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-4">
              <label class="form-label fw-bold">Mood</label>
              <select name="mood_id" class="form-select" required>
                <option value="">Choose mood...</option>
                @foreach ($moods as $mood)
                  <option value="{{ $mood->id }}">{{ $mood->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-4">
              <label class="form-label fw-bold">Rarity</label>
              <select name="rarity_id" class="form-select" required>
                <option value="">Choose rarity...</option>
                @foreach ($rarities as $rarity)
                  <option value="{{ $rarity->id }}">{{ $rarity->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-bold">Texture</label>
              <input type="text" name="texture" class="form-control" placeholder="Smooth, rough, polished..." required>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-bold">Color</label>
              <input type="text" name="color" class="form-control" placeholder="Gray, beige, #cccccc..." required>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-bold">Price (€)</label>
              <input type="number" step="0.01" name="price" class="form-control" placeholder="19.99" required>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-bold">Skills</label>
              <div class="d-flex flex-wrap gap-3">
                @foreach ($skills as $skill)
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="skills[]" id="skill_{{ $skill->id }}"
                      value="{{ $skill->id }}">
                    <label class="form-check-label" for="skill_{{ $skill->id }}">
                      {{ $skill->name }}
                    </label>
                  </div>
                @endforeach
              </div>
            </div>
            <div class="col-12">
              <label class="form-label fw-bold">Origin Story</label>
              <textarea name="origin_story" class="form-control" rows="4"
                placeholder="Found meditating by a river..."></textarea>
            </div>
            <!-- TODO: add image upload field -->
          </div>
          <div class="mt-4 d-flex justify-content-end gap-2">
            <a href="{{ route('admin.rocks.index') }}" class="btn btn-outline-danger">Cancel</a>
            <button type="submit" class="btn btn-secondary fw-bold">Create Rock</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection