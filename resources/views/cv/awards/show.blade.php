<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Detalle del Premio') }}
    </h2>
  </x-slot>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">{{ $award->title }}</h5>
            @if ($award->institution)
              <p class="card-text"><strong>{{ __('Institución:') }}</strong> {{ $award->institution }}</p>
            @endif
            <p class="card-text"><strong>{{ __('Año:') }}</strong> {{ $award->year }}</p>
            @if ($award->description)
              <p class="card-text"><strong>{{ __('Descripción:') }}</strong> {{ $award->description }}</p>
            @endif
          </div>
          <div class="card-footer d-flex gap-2">
            <a href="{{ route('awards.edit', $award) }}" class="btn btn-warning">
              <i class="bi bi-pencil"></i> {{ __('Editar') }}
            </a>
            <a href="{{ route('awards.index') }}" class="btn btn-light">
              {{ __('Volver') }}
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
