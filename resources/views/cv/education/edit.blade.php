<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('education') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="card">
          <div class="card-header">Agregar información</div>
          <div class="card-body">
            <form action="{{ route('education.update', $education) }}" method="post" class="requires-validation"
              enctype="multipart/form-data" novalidate>
              @method('put')
              @csrf
              <div class="row">
                <div class="col-md-6 mx-auto mb-1 mt-2 text-center">
                  <input class="form-control form-control-sm mt-2 @error('institution') is-invalid @enderror"
                    type="text" name="institution" value="{{ $education->institution }}" required>
                  <div class="valid-feedback">Institution field is valid!</div>
                  <div class="invalid-feedback">Institution field cannot be blank!</div>
                  @error('institution')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-6 mx-auto mb-1 mt-2 text-center">
                  <input class="form-control form-control-sm mt-2 @error('degree') is-invalid @enderror" type="text"
                    name="degree" placeholder="{{ __('degree') }}" value="{{ $education->degree }}" required>
                  <div class="valid-feedback">Degree field is valid!</div>
                  <div class="invalid-feedback">Degree field cannot be blank!</div>
                  @error('degree')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div
                  class="mt-2 col-md-12 col-sm-12 col-lg-12 mx-auto d-flex justify-content-center align-items-center">
                  <div class="form-floating">
                    <textarea cols="200" class="form-control form-control-sm mt-2 @error('description') is-invalid @enderror"
                      name="description" placeholder="Leave a comment here" id="floatingTextarea">{{ $education->description }}</textarea>
                    <label for="floatingTextarea">{{ __('Description of degree') }}</label>
                    @error('description')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <livewire:currently-position-checkbox :startDate="$education->startDate" :endDate="$education->endDate" :educationId="$education->id" />

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
