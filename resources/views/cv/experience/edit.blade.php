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
          <div class="card-header">
            <div class="row">
              <div class="col-md-3 ">{{ __('Edit Experience information') }}</div>
              <div class="col-md-3 "></div>
              <div class="col-md-3 "></div>
              <div class="col-md-3 text-end">
                <a href="{{ url()->previous() }}">{{ __('back') }}</a>
              </div>
            </div>
          </div>
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
                {{-- <livewire:currently-position-checkbox :startDate="$experiences->startDate" :endDate="$experiences->endDate" :experienceId="$experiences->id" /> --}}
                <div class="col-md-3 mx-auto mb-1 mt-2 text-center">
                  <input class="form-control form-control-sm mt-2 @error('startDate') is-invalid @enderror"
                    type="date" name="startDate" id="startDate"
                    value="{{ old('startDate') == null ? $experiences->startDate : old('startDate') }}" required>
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
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
