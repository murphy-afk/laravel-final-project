@extends('layouts.app')

@section('title', 'Skills')

@section('content')
  <div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1 class="fw-bold">All Skills</h1>
      <a href="{{ route('admin.skills.create') }}" class="btn btn-secondary">
        Add Skill
      </a>
    </div>
    <div class="card bg-dark text-light border border-secondary shadow-sm">
      <div class="card-body p-0">
        <table class="table table-dark table-hover table-striped mb-0 align-middle">
          <thead class="table-secondary text-dark">
            <tr>
              <th>Name</th>
              <th>Power</th>
              <th>Description</th>
              <th class="text-end">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($skills as $skill)
              <tr>
                <td class="fw-bold">{{ $skill->name }}</td>
                <td>{{ $skill->power_level }}</td>
                <td>{{ $skill->description }}</td>
                <td class="text-end">
                  <a href="{{ route('admin.skills.edit', $skill->id) }}" class="btn btn-sm btn-outline-warning me-2">
                    Edit
                  </a>
                  <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                    data-bs-target="#deleteMoodModal-{{ $skill->id }}">
                    Delete
                  </button>
                  <div class="modal fade" id="deleteMoodModal-{{ $skill->id }}" tabindex="-1"
                    aria-labelledby="deleteMoodLabel-{{ $skill->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content bg-dark text-light border border-secondary">
                        <div class="modal-header">
                          <h5 class="modal-title" id="deleteMoodLabel-{{ $skill->id }}">
                            Delete "{{ $skill->name }}"
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                          Are you sure you want to delete this skill?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cancel
                          </button>
                          <form action="{{ route('admin.skills.delete', $skill->id) }}" method="POST">
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