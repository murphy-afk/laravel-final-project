@extends('layouts.app')

@section('title', 'Rock Types')

@section('content')
 <div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1 class="fw-bold">All Rock Types</h1>
      <a href="{{ route('admin.types.create') }}" class="btn btn-secondary">
        Add Rock Type
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
            @foreach ($types as $type)
              <tr>
                <td class="fw-bold">{{ $type->name }}</td>
                <td class="text-light">
                  {{ $type->description ?? '—' }}
                </td>
                <td class="text-end">
                  <a href="{{ route('admin.types.edit', $type->id) }}" class="btn btn-sm btn-outline-warning me-2">
                    Edit
                  </a>
                  <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                    data-bs-target="#deleteMoodModal-{{ $type->id }}">
                    Delete
                  </button>
                  <div class="modal fade" id="deleteMoodModal-{{ $type->id }}" tabindex="-1"
                    aria-labelledby="deleteMoodLabel-{{ $type->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content bg-dark text-light border border-secondary">
                        <div class="modal-header">
                          <h5 class="modal-title" id="deleteMoodLabel-{{ $type->id }}">
                            Delete "{{ $type->name }}"
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                          Are you sure you want to delete this rock type?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cancel
                          </button>
                          <form action="{{ route('admin.types.delete', $type->id) }}" method="POST">
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