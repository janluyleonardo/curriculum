<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Editar Interés') }}
    </h2>
  </x-slot>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="card">
          <div class="card-header">{{ __('Editar información del interés') }}</div>
          <div class="card-body">
            <form action="{{ route('interests.update', $interest) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-4 mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name"
                      value="{{ $interest->name }}" required>
                    @error('name')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="category_id" class="form-label">Categoría (opcional)</label>
                    <select class="form-select" id="category_id" name="category_id">
                      <option value="" {{ is_null($interest->category_id) ? 'selected' : '' }}>Selecciona...
                      </option>
                      @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                          {{ $interest->category_id == $category->id ? 'selected' : '' }}>
                          {{ $category->name }}
                        </option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="dedication_level" class="form-label">Nivel de Dedicación (opcional)</label>
                    <select class="form-select" id="dedication_level" name="dedication_level">
                      <option value="" {{ is_null($interest->dedication_level) ? 'selected' : '' }}>Selecciona...
                      </option>
                      <option value="Ocasional" {{ $interest->dedication_level === 'Ocasional' ? 'selected' : '' }}>
                        Ocasional</option>
                      <option value="Frecuente" {{ $interest->dedication_level === 'Frecuente' ? 'selected' : '' }}>
                        Frecuente</option>
                      <option value="Profesional"
                        {{ $interest->dedication_level === 'Profesional' ? 'selected' : '' }}>
                        Profesional</option>
                    </select>
                  </div>
                  <div class="col-md-12 mb-3">
                    <label for="description" class="form-label">Descripción (opcional)</label>
                    <textarea class="form-control" id="description" name="description" rows="2">{{ $interest->description }}</textarea>
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-sm-12 col-lg-12 mx-auto d-flex justify-content-center align-items-center">
                <div class="form-button mt-2 mb-2 p-2 mx-auto">
                  <button id="submit" type="submit" class="btn btn-secondary">{{ __('Actualizar') }}</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
