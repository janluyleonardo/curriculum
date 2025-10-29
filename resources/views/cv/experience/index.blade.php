<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Experience') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="card">
          <div class="card-header">{{ __('Add experience information') }}</div>
          <div class="card-body">
            <form action="{{ route('experience.store') }}" method="post" class="requires-validation"
              enctype="multipart/form-data" novalidate>
              @csrf
              <div class="row">
                <div class="col-md-6 mx-auto mb-1 mt-2 text-center">
                  <input class="form-control form-control-sm mt-2 @error('position') is-invalid @enderror"
                    type="text" name="position" placeholder="{{ __('position') }}" value="{{ old('position') }}"
                    required>
                  @error('position')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-6 mx-auto mb-1 mt-2 text-center">
                  <input class="form-control form-control-sm mt-2 @error('company') is-invalid @enderror" type="text"
                    name="company" placeholder="{{ __('company') }}" value="{{ old('company') }}" required>
                  @error('company')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div
                  class="mt-2 col-md-12 col-sm-12 col-lg-12 mx-auto d-flex justify-content-center align-items-center text-center">
                  <div class="form-floating">
                    <textarea cols="200" class="form-control form-control-sm mt-2 @error('functions') is-invalid @enderror"
                      name="functions" placeholder="Leave a comment here" id="floatingTextarea">{{ old('functions') }}</textarea>
                    <label for="floatingTextarea">{{ __('Functions of charge') }}</label>
                    @error('functions')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                <div class="col-md-3 mx-auto mb-1 mt-2 text-center">
                  <input class="form-control form-control-sm mt-2 @error('startDate') is-invalid @enderror"
                    type="date" name="startDate" id="startDate"
                    value="{{ old('startDate') == null ? $startDate : old('startDate') }}" required>
                  <span style="font-size: 0.75em;">{{ __('startDate') }}</span>
                  @error('startDate')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-md-3 mt-2">
                  <div class="form-check">
                    <input class="form-check-input form-control-sm" type="checkbox" id="currentlyPosition"
                      name="currentlyPosition" {{ $endDateDisabled ? 'checked' : '' }}>
                    <label class="form-check-label form-control-sm" for="currentlyPosition">
                      {{ __('¿Is Currently position?') }}
                    </label>
                  </div>
                </div>

                <div class="col-md-3 mx-auto mb-1 mt-2 text-center">
                  <input class="form-control form-control-sm mt-2 @error('endDate') is-invalid @enderror" type="date"
                    name="endDate" id="endDate" value="{{ old('endDate') == null ? $endDate : old('endDate') }}"
                    @if ($endDateDisabled) disabled @endif>
                  <span style="font-size: 0.75em;">{{ __('endDate') }}</span>
                  @error('endDate')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-md-12 col-sm-12 col-lg-12 mx-auto d-flex justify-content-center align-items-center">
                  <div class="form-button mt-2 mb-2 p-2 mx-auto">
                    <button id="submit" type="submit" class="btn btn-secondary">{{ __('Add info') }}</button>
                  </div>
                </div>
              </div>
            </form>
            @if ($experiences->isNotEmpty())
              <hr>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('position') }}</th>
                    <th scope="col">{{ __('company') }}</th>
                    <th scope="col">{{ __('startDate') }}</th>
                    <th scope="col">{{ __('endDate') }}</th>
                    <th scope="col">{{ __('Actions') }}</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($experiences as $experience)
                    <tr>
                      <th scope="row">{{ $experience->id }}</th>
                      <td>{{ $experience->position }}</td>
                      <td>{{ $experience->company }}</td>
                      <td>{{ $experience->startDate }}</td>
                      <td>{{ $experience->endDate }}</td>
                      <td>
                        <a href="{{ route('experience.show', $experience->id) }}"
                          class="btn btn-warning">{{ __('show') }}</a>
                        <a href="{{ route('experience.edit', $experience->id) }}"
                          class="btn btn-info">{{ __('edit') }}</a>
                        <form action="{{ route('experience.destroy', $experience->id) }}" method="POST"
                          style="display:inline;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">{{ __('delete') }}</button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const currentlyPositionCheckbox = document.getElementById('currentlyPosition');
      const endDateInput = document.getElementById('endDate');

      // Deshabilita el campo `endDate` si el checkbox está marcado al cargar la página
      if (currentlyPositionCheckbox.checked) {
        endDateInput.disabled = true;
      }

      // Escucha cambios en el checkbox
      currentlyPositionCheckbox.addEventListener('change', function() {
        endDateInput.disabled = this.checked;
        if (this.checked) {
          endDateInput.value = ''; // Opcional: limpiar el valor de `endDate`
        }
      });
    });
  </script>

</x-app-layout>
