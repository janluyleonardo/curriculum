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
              <div class="col-md-3 ">Información personal</div>
              <div class="col-md-3 "></div>
              <div class="col-md-3 "></div>
              <div class="col-md-3 text-end">
                <a href="{{ url()->previous() }}">{{ __('Back') }}</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-2 text-center mx-auto">
                <img src="{{ asset('storage/' . $about->Photo) }}" class="rounded mx-auto d-block border border-dark"
                  alt="{{ asset('storage/' . $about->Photo) }}">
                <span style="font-size: 0.75em;">Foto</span>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 mx-auto mt-2 text-center">
                {{ $about->personalProfile }}<br>
                <span style="font-size: 0.75em;">Perfil personal</span>
              </div>
              <div class="col-md-2 mx-auto mt-2 text-center">
                {{ $about->dateOfBirth }}<br>
                <span style="font-size: 0.75em;">Fecha de nacimiento</span>
              </div>
              <div class="col-md-3 mx-auto mt-2 text-center">
                {{ $about->name }}<br>
                <span style="font-size: 0.75em;">Nombre completo</span>
              </div>
              <div class="col-md-2 mx-auto mt-2 text-center">
                {{ $about->document }}<br>
                <span style="font-size: 0.75em;">N° documento</span>
              </div>
              <div class="col-md-2 mx-auto mt-2 text-center">
                {{ $about->phone }}<br>
                <span style="font-size: 0.75em;">N° Telefono</span>
              </div>
              <div class="col-md-2 mx-auto mt-2 text-center">
                {{ $about->city }}<br>
                <span style="font-size: 0.75em;">Ciudad</span>
              </div>
              <div class="col-md-2 mx-auto mt-2 text-center">
                {{ $about->department }}<br>
                <span style="font-size: 0.75em;">Departamento</span>
              </div>
              <div class="col-md-2 mx-auto mt-2 text-center">
                {{ $about->locality->name }}<br>
                <span style="font-size: 0.75em;">Localidad</span>
              </div>
              <div class="col-md-2 mx-auto mt-2 text-center">
                {{ $about->address }}<br>
                <span style="font-size: 0.75em;">Direccion</span>
              </div>
              <div class="col-md-2 mx-auto mt-2 text-center">
                {{ $about->barrio }}<br>
                <span style="font-size: 0.75em;">Barrio</span>
              </div>
              <!-- Sección para redes sociales -->
              @if (!empty($about->social_media_links))
                <h4>Redes Sociales</h4>
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
