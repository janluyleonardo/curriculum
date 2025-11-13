<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Agregar Premio') }}
    </h2>
  </x-slot>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
        <form action="{{ route('awards.store') }}" method="POST">
          @csrf
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="title" class="form-label">{{ __('Título') }} *</label>
              <input type="text" class="form-control" id="title" name="title" required>
              @error('title')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6 mb-3">
              <label for="institution" class="form-label">{{ __('Institución') }}</label>
              <input type="text" class="form-control" id="institution" name="institution">
            </div>
            <div class="col-md-6 mb-3">
              <label for="year" class="form-label">{{ __('Año') }} *</label>
              <input type="number" class="form-control" id="year" name="year" min="1900"
                max="{{ date('Y') + 1 }}" required>
              @error('year')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-12 mb-3">
              <label for="description" class="form-label">{{ __('Descripción') }}</label>
              <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
          </div>
          <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
            <a href="{{ route('awards.index') }}" class="btn btn-light">{{ __('Cancelar') }}</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>
