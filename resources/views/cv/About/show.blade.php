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
          <div class="card-header">
            <div class="row">
              <div class="col-md-3 ">{{ __('Personal Information') }}</div>
              <div class="col-md-3 "></div>
              <div class="col-md-3 "></div>
              <div class="col-md-3 text-end">
                <a href="{{ url()->previous() }}">{{ __('back') }}</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-2 text-center mx-auto">
                <img src="{{ asset('storage/' . $about->Photo) }}" class="rounded mx-auto d-block border border-dark"
                  alt="{{ asset('storage/' . $about->Photo) }}">
                <span style="font-size: 0.75em;">{{ __('Photo') }}</span>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 mx-auto mt-2 text-center">
                {{ $about->personalProfile }}<br>
                <span style="font-size: 0.75em;">{{ __('Professional profile') }}</span>
              </div>
              <div class="col-md-2 mx-auto mt-2 text-center">
                {{ $about->dateOfBirth }}<br>
                <span style="font-size: 0.75em;">{{ __('dateOfBirth') }}</span>
              </div>
              <div class="col-md-3 mx-auto mt-2 text-center">
                {{ $about->name }}<br>
                <span style="font-size: 0.75em;">{{ __('Full Name') }}</span>
              </div>
              <div class="col-md-2 mx-auto mt-2 text-center">
                {{ $about->document }}<br>
                <span style="font-size: 0.75em;">{{ __('document number') }}</span>
              </div>
              <div class="col-md-2 mx-auto mt-2 text-center">
                {{ $about->phone }}<br>
                <span style="font-size: 0.75em;">{{ __('phone number') }}</span>
              </div>
              <div class="col-md-2 mx-auto mt-2 text-center">
                {{ $about->city }}<br>
                <span style="font-size: 0.75em;">{{ __('city') }}</span>
              </div>
              <div class="col-md-2 mx-auto mt-2 text-center">
                {{ $about->department }}<br>
                <span style="font-size: 0.75em;">{{ __('department') }}</span>
              </div>
              <div class="col-md-2 mx-auto mt-2 text-center">
                {{ $about->locality->name }}<br>
                <span style="font-size: 0.75em;">{{ __('locality') }}</span>
              </div>
              <div class="col-md-2 mx-auto mt-2 text-center">
                {{ $about->address }}<br>
                <span style="font-size: 0.75em;">{{ __('address') }}</span>
              </div>
              <div class="col-md-2 mx-auto mt-2 text-center">
                {{ $about->barrio }}<br>
                <span style="font-size: 0.75em;">{{ __('neighborhood') }}</span>
              </div>
              <!-- Sección para redes sociales -->
              @if (!empty($about->social_media_links))
                <h4>{{ __('Social Media') }}</h4>
                @foreach ($about->social_media_links as $platform => $link)
                  <div class="col-md-3 mx-auto mt-2 text-center">
                    {{ $link }}<br>
                    <span style="font-size: 0.75em;">{{ $platform }}</span>
                  </div>
                @endforeach
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
