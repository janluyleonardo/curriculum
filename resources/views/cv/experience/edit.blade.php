<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Experiences') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="card">
          <div class="card-header">Agregar información</div>
          <div class="card-body">
            <form action="{{ route('experience.update', $experiences) }}" method="post" class="requires-validation"
              enctype="multipart/form-data" novalidate>
              @method('put')
              @csrf
              <div class="row">
                <div class="col-md-6 mx-auto mb-1 mt-2 text-center">
                  <input class="form-control form-control-sm mt-2 @error('position') is-invalid @enderror"
                    type="text" name="position" value="{{ $experiences->position }}" required>
                  <div class="valid-feedback">Position field is valid!</div>
                  <div class="invalid-feedback">Position field cannot be blank!</div>
                  @error('position')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-6 mx-auto mb-1 mt-2 text-center">
                  <input class="form-control form-control-sm mt-2 @error('company') is-invalid @enderror" type="text"
                    name="company" placeholder="{{ __('company') }}" value="{{ $experiences->company }}" required>
                  <div class="valid-feedback">Company field is valid!</div>
                  <div class="invalid-feedback">Company field cannot be blank!</div>
                  @error('company')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div
                  class="mt-2 col-md-12 col-sm-12 col-lg-12 mx-auto d-flex justify-content-center align-items-center">
                  <div class="form-floating">
                    <textarea cols="200" class="form-control form-control-sm mt-2 @error('functions') is-invalid @enderror"
                      name="functions" placeholder="Leave a comment here" id="floatingTextarea">{{ $experiences->functions }}</textarea>
                    <label for="floatingTextarea">{{ __('Functions of charge') }}</label>
                    @error('functions')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <livewire:currently-position-checkbox :startDate="$experiences->startDate" :endDate="$experiences->endDate" :experienceId="$experiences->id" />

              <div class="col-md-12 col-sm-12 col-lg-12 mx-auto d-flex justify-content-center align-items-center">
                <div class="form-button mt-2 mb-2 p-2 mx-auto">
                  <button id="submit" type="submit" class="btn btn-secondary">{{ __('Add info') }}</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>

<script>
  document.querySelectorAll('.form-check-input').forEach(checkbox => {
    checkbox.addEventListener('change', function() {
      const linkInput = document.getElementById(`${this.id}_link`);
      if (this.checked) {
        linkInput.style.display = 'block';
      } else {
        linkInput.style.display = 'none';
      }
    });
  });
</script>
