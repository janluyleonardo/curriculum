<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('About') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="card">
          <div class="card-header">{{ __('add information') }}</div>
          <div class="card-body">

            @if ($abouts->isNotEmpty())
              <table class="table">
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
                        <a href="{{ route('about.edit', $about->id) }}" class="btn btn-info">Edit</a>
                        <form action="{{ route('about.destroy', $about->id) }}" method="POST" style="display:inline;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            @else
              <form action="{{ route('about.store') }}" method="post" class="requires-validation"
                enctype="multipart/form-data" novalidate>
                @csrf
                <div class="row">
                  <div class="col-md-6 mx-auto mb-1 mt-2 text-center">
                    <input class="form-control form-control-sm mt-2 @error('dateOfBirth') is-invalid @enderror"
                      type="date" name="dateOfBirth" id="fechaNacimiento" value="{{ old('dateOfBirth') }}" required>
                    <span style="font-size: 0.75em;">{{ __('dateOfBirth') }}</span>
                    @error('dateOfBirth')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-6 mx-auto mb-1 mt-2 text-center">
                    <input class="form-control form-control-sm mt-2 @error('Photo') is-invalid @enderror" type="file"
                      name="Photo" accept="image/png, image/jpeg" required>
                    <span style="font-size: 0.75em;">{{ __('Photo') }} 3 x 4</span>
                    @error('Photo')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-6 mx-auto mb-1 mt-2 text-center">
                    <input class="form-control form-control-sm mt-2 @error('name') is-invalid @enderror" type="text"
                      name="name" placeholder="{{ __('Full Name') }}" value="{{ old('name') }}" required>
                    @error('name')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-3 mx-auto mt-2 text-center">
                    <input class="form-control form-control-sm mt-2 @error('document') is-invalid @enderror"
                      type="number" name="document" placeholder="{{ __('document number') }}"
                      value="{{ old('document') }}" required>
                    @error('document')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-3 mx-auto mt-2">
                    <input class="form-control form-control-sm mt-2 @error('phone') is-invalid @enderror" type="number"
                      name="phone" placeholder="{{ __('phone number') }}" value="{{ old('phone') }}" required>
                    @error('phone')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-4 mx-auto mt-2 text-center">
                    <input class="form-control form-control-sm mt-2 @error('city') is-invalid @enderror" type="text"
                      name="city" placeholder="{{ __('city') }}" value="{{ old('city') }}" required>
                    @error('city')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-4 mx-auto mb-1 mt-2 text-center">
                    <input class="form-control form-control-sm mt-2 @error('department') is-invalid @enderror"
                      type="text" name="department" placeholder="{{ __('department') }}"
                      value="{{ old('department') }}" required>
                    @error('department')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-4 mb-1 mt-2 text-center">
                    <select class="form-control form-control-sm mt-2 @error('id_locality') is-invalid @enderror"
                      name="id_locality" id="id_locality" required>
                      <option value="" disabled selected>{{ __('Select a locality') }}</option>
                      @foreach ($localities as $locality)
                        <option value="{{ $locality->id }}"
                          {{ old('id_locality') == $locality->id ? 'selected' : '' }}>{{ $locality->name }}
                        </option>
                      @endforeach
                    </select>
                    @error('id_locality')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-6 mx-auto mb-1 mt-2 text-center">
                    <input class="form-control form-control-sm mt-2 @error('address') is-invalid @enderror"
                      type="text" name="address" placeholder="{{ __('address') }}" value="{{ old('address') }}"
                      required>
                    @error('address')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-6 mx-auto mt-2 text-center">
                    <input class="form-control form-control-sm mt-2 @error('barrio') is-invalid @enderror"
                      type="text" name="barrio" placeholder="{{ __('neighborhood') }}" value="{{ old('barrio') }}"
                      required>
                    @error('barrio')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="mt-2 col-md-12 mx-auto text-center">
                    <textarea cols="200" class="form-control form-control-sm mt-2 @error('personalProfile') is-invalid @enderror"
                      name="personalProfile" placeholder="{{ __('Professional profile') }}" id="floatingTextarea">{{ old('personalProfile') }}</textarea>
                    @error('personalProfile')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <!-- Sección para redes sociales -->
                <div class="col-md-3 mt-2">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="facebook" name="social_media[facebook]">
                    <label class="form-check-label" for="facebook">Facebook</label>
                    <input type="text" id="facebook_link" name="social_media_links[facebook]"
                      class="form-control mt-2" style="display: none;" placeholder="Enlace de Facebook">
                  </div>
                </div>
                <div class="col-md-3 mt-2">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="twitter" name="social_media[twitter]">
                    <label class="form-check-label" for="twitter">X</label>
                    <input type="text" id="twitter_link" name="social_media_links[twitter]"
                      class="form-control mt-2" style="display: none;" placeholder="Enlace de Twitter">
                  </div>
                </div>
                <div class="col-md-3 mt-2">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="instagram" name="social_media[instagram]">
                    <label class="form-check-label" for="instagram">Instagram</label>
                    <input type="text" id="instagram_link" name="social_media_links[instagram]"
                      class="form-control mt-2" style="display: none;" placeholder="Enlace de Instagram">
                  </div>
                </div>
                <div class="col-md-3 mt-2">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="linkedin" name="social_media[linkedin]">
                    <label class="form-check-label" for="linkedin">LinkedIn</label>
                    <input type="text" id="linkedin_link" name="social_media_links[linkedin]"
                      class="form-control mt-2" style="display: none;" placeholder="Enlace de LinkedIn">
                  </div>
                </div>
                <div class="col-md-12 col-sm-12 col-lg-12 mx-auto d-flex justify-content-center align-items-center">
                  <div class="form-button mt-2 mb-2 p-2 mx-auto">
                    <button id="submit" type="submit" class="btn btn-secondary">{{ __('Add info') }}</button>
                  </div>
                </div>
          </div>
          </form>
          @endif
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
