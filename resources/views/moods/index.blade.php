@extends('layouts.app')

@section('title', 'All Moods')

@section('content')
  <div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1 class="fw-bold">All Moods</h1>
      <a href="{{ route('admin.moods.create') }}" class="btn btn-secondary">
        Add Mood
      </a>
    </div>
    <div class="card bg-dark text-light border border-secondary shadow-sm">
      <div class="card-body p-0">
        <table class="table table-dark table-hover table-striped mb-0 align-middle">
          <thead class="table-secondary text-dark">
            <tr>
              <th>Name</th>
              <th>Description</th>
              <th class="text-end">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($moods as $mood)
              <tr>
                <td class="fw-bold">{{ $mood->name }}</td>
                <td class="text-light">
                  {{ $mood->description ?? '—' }}
                </td>
                <td class="text-end">
                  <a href="{{ route('admin.moods.edit', $mood->id) }}" class="btn btn-sm btn-outline-warning me-2">
                    Edit
                  </a>
                  <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                    data-bs-target="#deleteMoodModal-{{ $mood->id }}">
                    Delete
                  </button>
                  <div class="modal fade" id="deleteMoodModal-{{ $mood->id }}" tabindex="-1"
                    aria-labelledby="deleteMoodLabel-{{ $mood->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content bg-dark text-light border border-secondary">
                        <div class="modal-header">
                          <h5 class="modal-title" id="deleteMoodLabel-{{ $mood->id }}">
                            Delete "{{ $mood->name }}"
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                          Are you sure you want to delete this mood?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cancel
                          </button>
                          <form action="{{ route('admin.moods.destroy', $mood->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                          </form>
                        </div>

                      </div>
                    </div>

                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection