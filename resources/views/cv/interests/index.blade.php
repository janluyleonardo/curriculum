<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('interests') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="card">
          <div class="card-header">{{ __('Add interests information') }}</div>
          <div class="card-body">
            <form action="{{ route('interests.store') }}" method="POST">
              @csrf
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-4 mb-3 ">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name">
                    @error('name')
                      <div class="text-center text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="category" class="form-label">Categoría (opcional)</label>
                    {{-- <input type="text" class="form-control" id="category" name="category"> --}}
                    <select class="form-select" id="category_id" name="category_id">
                      <option value="" selected disabled>Selecciona la categoría</option>
                      @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="dedication_level" class="form-label">Nivel de Dedicación (opcional)</label>
                    <select class="form-select" id="dedication_level" name="dedication_level">
                      <option value="" selected disabled>Selecciona el nivel de dedicación</option>
                      <option value="Ocasional">Ocasional</option>
                      <option value="Frecuente">Frecuente</option>
                      <option value="Profesional">Profesional</option>
                    </select>
                  </div>
                  <div class="col-md-12 mb-3">
                    <label for="description" class="form-label">Descripción (opcional)</label>
                    <textarea class="form-control" id="description" name="description" rows="2"></textarea>
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-sm-12 col-lg-12 mx-auto d-flex justify-content-center align-items-center">
                <div class="form-button mt-2 mb-2 p-2 mx-auto">
                  <button id="submit" type="submit" class="btn btn-secondary">{{ __('Add info') }}</button>
                </div>
              </div>
            </form>
            <div class="row">
              @forelse ($interests as $interest)
                <div class="col-md-4 mb-3">
                  <div class="border rounded p-3 h-100">
                    <h5>{{ $interest->name }}</h5>
                    @if ($interest->category)
                      <p class="text-muted mb-1">
                        <small>{{ $interest->category ? $interest->category->name : 'No especificada' }}</small>
                      </p>
                    @endif
                    @if ($interest->description)
                      <p>{{ $interest->description }}</p>
                    @endif
                    @if ($interest->dedication_level)
                      <p class="text-muted mb-0"><small>Nivel: {{ $interest->dedication_level }}</small></p>
                    @endif
                    <!-- Botón para editar el interés -->
                    <a href="{{ route('interests.edit', $interest) }}" class="btn btn-sm btn-warning">
                      <i class="bi bi-pencil"></i> Editar
                    </a>
                    <!-- Botón para eliminar el interés -->
                    <form action="{{ route('interests.destroy', $interest) }}" method="POST" class="mt-2">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger">
                        <i class="bi bi-trash"></i> Eliminar
                      </button>
                    </form>
                  </div>
                </div>
              @empty
                <div class="col-12">
                  <p class="text-muted">No tienes intereses registrados.</p>
                </div>
              @endforelse
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
