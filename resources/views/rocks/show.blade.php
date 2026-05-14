@extends('layouts.rocks')

@section('title', $rock->name)

@section('content')

  <div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1 class="fw-bold">{{ $rock->name }}</h1>
      <div>
        <a href="{{ route('admin.rocks.index') }}" class="btn btn-secondary me-2">Back</a>
        <a href="" class="btn btn-primary me-2">Edit</a>
        <form action="" method="POST" class="d-inline">
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
          <img src="{{ $rock->image_url ?? 'https://picsum.photos/500/600' }}" class="img-fluid rounded-start"
            alt="{{ $rock->name }}">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h4 class="fw-bold mb-3">Rock Details</h4>
            <p>Weight: {{ $rock->weight }} g</p>
            <p>Texture: {{ $rock->texture }}</p>
            <p>Color: {{ $rock->color }}</p>
            <p>Price: €{{ number_format($rock->price, 2) }}</p>
            <p>Mood: {{ $rock->mood?->name }}</p>
            <p>Rarity: {{ $rock->rarity?->name }}</p>
            <p>Type:
              @if($rock->type)
                {{ $rock->type->name }}
              @else
                No type assigned
              @endif
            </p>
            <p class="mt-3">Origin Story:</p>
            <p class="text-muted">{{ $rock->origin_story }}</p>
          </div>
        </div>
      </div>
    </div>
    <div class="card shadow-sm mb-4">
      <div class="card-body">
        <h4 class="fw-bold mb-3">Skills</h4>
        @if($rock->skills && $rock->skills->count() > 0)
          @foreach ($rock->skills as $skill)
            <span class="badge bg-primary me-2 mb-2">{{ $skill->name }}</span>
          @endforeach
        @else
          <p class="text-muted">This rock has no skills yet :< </p>
        @endif
      </div>
    </div>
  </div>
@endsection