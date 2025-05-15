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
          <div class="card-header">add experience information</div>
          <div class="card-body">
            <form action="{{ route('about.store') }}" method="post" class="requires-validation"
              enctype="multipart/form-data" novalidate>
              @csrf
              <div class="row">
                <div class="col-md-6 mx-auto mb-1 mt-2 text-center">
                  <input class="form-control form-control-sm mt-2 @error('position') is-invalid @enderror"
                    type="text" name="position" placeholder="{{ __('position') }}" value="{{ old('position') }}"
                    required>
                  <div class="valid-feedback">Position field is valid!</div>
                  <div class="invalid-feedback">Position field cannot be blank!</div>
                  @error('position')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-6 mx-auto mb-1 mt-2 text-center">
                  <input class="form-control form-control-sm mt-2 @error('company') is-invalid @enderror" type="text"
                    name="company" placeholder="{{ __('company') }}" value="{{ old('company') }}" required>
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
                      name="functions" placeholder="Leave a comment here" id="floatingTextarea">{{ old('functions') }}</textarea>
                    <label for="floatingTextarea">{{ __('Functions of charge') }}</label>
                    @error('functions')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                <div class="col-md-3 mx-auto mb-1 mt-2 text-center">
                  <input class="form-control form-control-sm mt-2 @error('startDate') is-invalid @enderror"
                    type="date" name="startDate" id="startDate" value="{{ old('startDate') }}" required>
                  <span style="font-size: 0.75em;">Fecha de inicio</span>
                  <div class="valid-feedback mv-up">You selected a fecha de inicio!</div>
                  <div class="invalid-feedback mv-up">Please select a fecha de inicio!</div>
                  @error('startDate')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-3 mt-2">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="currentlyPosition" name="currentlyPosition">
                    <label class="form-check-label" for="currentlyPosition">¿currently position?</label>
                  </div>
                </div>
                <div class="col-md-3 mx-auto mb-1 mt-2 text-center">
                  <input class="form-control form-control-sm mt-2 @error('endDate') is-invalid @enderror" type="date"
                    name="endDate" id="endDate" value="{{ old('endDate') }}" required>
                  <span style="font-size: 0.75em;">Fecha de finalizacion</span>
                  <div class="valid-feedback mv-up">You selected a fecha de finalizacion!</div>
                  <div class="invalid-feedback mv-up">Please select a fecha de finalizacion!</div>
                  @error('endDate')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-12 col-sm-12 col-lg-12 mx-auto d-flex justify-content-center align-items-center">
                  <div class="form-button mt-2 mb-2 p-2 mx-auto">
                    <button id="submit" type="submit" class="btn btn-secondary">{{ __('Add info') }}</button>
                  </div>
                </div>
            </form>
            <hr>
            {{-- <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">{{ __('Full Name') }}</th>
                  <th scope="col">{{ __('DocumentNumber') }}</th>
                  <th scope="col">{{ __('Phone') }}</th>
                  <th scope="col">{{ __('Actions') }}</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($abouts as $about)
                  <tr>
                    <th scope="row">{{ $about->id }}</th>
                    <td>{{ $about->name }}</td>
                    <td>{{ $about->document }}</td>
                    <td>{{ $about->phone }}</td>
                    <td>
                      <a href="{{ route('about.show', $about->id) }}" class="btn btn-warning">Show</a>
                      <a href="{{ route('about.edit', $about->id) }}" class="btn btn-primary">Edit</a>
                      <form action="{{ route('about.destroy', $about->id) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table> --}}
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
