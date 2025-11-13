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
          <div class="card-header">{{ __('add education information') }}</div>
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
                  @error('institution')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-6 mx-auto mb-1 mt-2 text-center">
                  <input class="form-control form-control-sm mt-2 @error('degree') is-invalid @enderror" type="text"
                    name="degree" placeholder="{{ __('degree') }}" value="{{ old('degree') }}" required>
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
                      {{ __('studying currently') }}
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
              </div>
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
                        <div class="btn-group" role="group" aria-label="Basic example">
                          <a href="{{ route('education.show', $education->id) }}" class="btn btn-info">Show</a>
                          <a href="{{ route('education.edit', $education->id) }}" class="btn btn-warning">Edit</a>
                          <a title="Eliminar" href="#deleteModal{{ $education->id }}" class="sombra btn btn-danger"
                            data-bs-toggle="modal">{{ __('Delete') }}</a>
                        </div>
                      </td>
                    </tr>
                    <!-- Modal delete-->
                    <div class="modal fade" id="deleteModal{{ $education->id }}" tabindex="-1"
                      aria-labelledby="deleteModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content sombra bg-white">
                          <div class="modal-header sombra bn-100">
                            <h1 class="modal-title fs-5 mx-auto" id="exampleModalLabel">
                              esta seguro(a) de eliminar el registro de:
                            </h1>
                            <button type="button" class="btn-close sombra" data-bs-dismiss="modal"
                              aria-label="Close"></button>
                          </div>
                          <div class="modal-body sombra">
                            <strong>{{ Str::upper($education->institution) }}</strong><br>
                            <strong>{{ Str::upper($education->degree) }}</strong>
                          </div>
                          <div class="modal-footer bn-100">
                            {{-- <button type="button" class=" sombra btn btn-warning"
                              data-bs-dismiss="modal">Close</button> --}}
                            <form action="{{ route('education.destroy', $education->id) }}" method="POST"
                              style="display:inline;">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger">{{ __('delete') }}</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
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
