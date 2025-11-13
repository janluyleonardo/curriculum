<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('my awards') }}
    </h2>
  </x-slot>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h3>{{ __('my awards list') }}</h3>
          <a href="{{ route('awards.create') }}" class="btn btn-primary">
            <i class="bi bi-plus"></i> {{ __('add award') }}
          </a>
        </div>
        <div class="row">
          @forelse ($awards as $award)
            <div class="col-md-4 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <h5 class="card-title">{{ $award->title }}</h5>
                  @if ($award->institution)
                    <p class="card-text"><strong>Institución:</strong> {{ $award->institution }}</p>
                  @endif
                  <p class="card-text"><strong>Año:</strong> {{ $award->year }}</p>
                  @if ($award->description)
                    <p class="card-text">{{ $award->description }}</p>
                  @endif
                </div>
                <div class="card-footer d-flex gap-2">
                  <a href="{{ route('awards.show', $award) }}" class="btn btn-sm btn-info">
                    <i class="bi bi-eye"></i> {{ __('see') }}
                  </a>
                  <a href="{{ route('awards.edit', $award) }}" class="btn btn-sm btn-warning">
                    <i class="bi bi-pencil"></i> {{ __('edit') }}
                  </a>
                  <form action="{{ route('awards.destroy', $award) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">
                      <i class="bi bi-trash"></i> {{ __('delete') }}
                    </button>
                  </form>
                </div>
              </div>
            </div>
          @empty
            <div class="col-12">
              <p class="text-muted">{{ __('No awards registered') }}</p>
            </div>
          @endforelse
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
