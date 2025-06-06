<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Education') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="card">
          <div class="card-header">add education information</div>
          <div class="card-body">
            <form action="{{ route('education.store') }}" method="post" class="requires-validation"
              enctype="multipart/form-data" novalidate>
              @csrf
              <div class="row">
                <div class="col-md-12">
                  <input type="hidden" name="userId" id="userId" value="{{ Auth::user()->id }}">
                </div>
                <div class="col-md-6 mx-auto mb-1 mt-2 text-center">
                  <input class="form-control form-control-sm mt-2 @error('institution') is-invalid @enderror"
                    type="text" name="institution" placeholder="{{ __('institution') }}"
                    value="{{ old('institution') }}" required>
                  <div class="valid-feedback">Institution field is valid!</div>
                  <div class="invalid-feedback">Institution field cannot be blank!</div>
                  @error('institution')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-6 mx-auto mb-1 mt-2 text-center">
                  <input class="form-control form-control-sm mt-2 @error('degree') is-invalid @enderror" type="text"
                    name="degree" placeholder="{{ __('degree') }}" value="{{ old('degree') }}" required>
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
                      name="description" placeholder="Leave a comment here" id="floatingTextarea">{{ old('description') }}</textarea>
                    <label for="floatingTextarea">{{ __('description of degree') }}</label>
                    @error('description')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <livewire:currently-position-checkbox />

              <div class="col-md-12 col-sm-12 col-lg-12 mx-auto d-flex justify-content-center align-items-center">
                <div class="form-button mt-2 mb-2 p-2 mx-auto">
                  <button id="submit" type="submit" class="btn btn-secondary">{{ __('Add info') }}</button>
                </div>
              </div>
            </form>
            @if ($educations->isNotEmpty())
              <hr>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('Institution') }}</th>
                    <th scope="col">{{ __('Degree') }}</th>
                    <th scope="col">{{ __('Fecha inicial') }}</th>
                    <th scope="col">{{ __('Fecha final') }}</th>
                    <th scope="col">{{ __('Actions') }}</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($educations as $education)
                    <tr>
                      <th scope="row">{{ $education->id }}</th>
                      <td>{{ $education->institution }}</td>
                      <td>{{ $education->degree }}</td>
                      <td>{{ $education->startDate }}</td>
                      <td>{{ $education->endDate }}</td>
                      <td>
                        <a href="{{ route('education.show', $education->id) }}" class="btn btn-warning">Show</a>
                        <a href="{{ route('education.edit', $education->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('education.destroy', $education->id) }}" method="POST"
                          style="display:inline;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">Delete</button>
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
</x-app-layout>
