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
          <div class="card-header">Agregar información</div>
          <div class="card-body">

            <form action="{{ route('about.store') }}" method="post"class="requires-validation"
              enctype="multipart/form-data" novalidate>
              @csrf
              <div class="row">
                <div class="col-md-4 mx-auto mt-2 text-center">
                  <input class="form-control form-control-sm" type="date" name="fechaNacimiento" id="fechaNacimiento"
                    required>
                  <span style="font-size: 0.75em;">Fecha de nacimiento</span>
                  <div class="valid-feedback mv-up">You selected a fecha de nacimiento!</div>
                  <div class="invalid-feedback mv-up">Please select a fecha de nacimiento!</div>
                </div>
                {{-- <div class="col-md-4 mb-1 mt-2 text-center">
                <input class="form-control form-control-sm" type="date" name="fechaInscripcion" required>
                <span style="font-size: 0.75em;">Fecha de {{ __('Registration') }}</span>
                <div class="valid-feedback mv-up">You selected a fecha de matricula!</div>
                <div class="invalid-feedback mv-up">Please select a fecha de matricula!</div>
              </div> --}}
                {{-- <div class="col-md-4 mx-auto mt-2 text-center">
                <input type="radio" class="btn-check mx-auto" name="genero" id="masc" value="Masculino"
                  required>
                <label class="btn btn-sm btn-outline-secondary" for="masc">
                  <i>
                    <img src="{{ asset('images/icono-niño.png') }}" alt="icono-niño" width="24px">
                  </i>
                </label>
                <input type="radio" class="btn-check mx-auto" name="genero" id="fem" value="Femenino" required>
                <label class="btn btn-sm btn-outline-secondary" for="fem">
                  <i>
                    <img src="{{ asset('images/icono-niña.png') }}" alt="icono-niña" width="24px">
                  </i>
                </label><br>
                <span style="font-size: 0.75em;">Genero</span>
                <div class="valid-feedback">Gender field is valid!</div>
                <div class="invalid-feedback">Gender field cannot be blank!</div>
              </div> --}}
                {{-- <div class="col-md-12">
                <input class="form-control form-control-sm mt-2" type="file" name="Photo"
                  accept="image/png, image/jpeg" required>
                <div class="valid-feedback">UserPhoto field is valid!</div>
                <div class="invalid-feedback">UserPhoto field cannot be blank!</div>
              </div> --}}
                <div class="col-md-9">
                  <input class="form-control form-control-sm mt-2" type="text" name="nomDeportista"
                    placeholder="{{ __('Full Name') }}" required>
                  <div class="valid-feedback">Username field is valid!</div>
                  <div class="invalid-feedback">Username field cannot be blank!</div>
                </div>
                <div class="col-md-3 mx-auto mt-2">
                  <input class="form-control form-control-sm" type="number" name="numDocumento"
                    placeholder="N° documento" required>
                  <div class="valid-feedback">Numero de documento field is valid!</div>
                  <div class="invalid-feedback">Numero de documento field cannot be blank!</div>
                </div>
                <div class="col-md-4 mx-auto mt-2">
                  <input class="form-control form-control-sm" type="text" name="Ciudad" placeholder="Ciudad"
                    required>
                  <div class="valid-feedback">Ciudad field is valid!</div>
                  <div class="invalid-feedback">Ciudad field cannot be blank!</div>
                </div>
                {{-- <div class="col-md-2 mx-auto mt-2">
                <input class="form-control form-control-sm" type="text" name="PesoDeportista" id="PesoDeportista"
                  placeholder="Peso" required>
                <div class="valid-feedback">Peso field is valid!</div>
                <div class="invalid-feedback">Peso field cannot be blank!</div>
              </div> --}}
                {{-- <div class="col-md-2 mx-auto mt-2 ">
                <input class="form-control form-control-sm" type="text" name="EstaturaDeportista"
                  id="EstaturaDeportista" placeholder="Estatura" required>
                <div class="valid-feedback">Estatura field is valid!</div>
                <div class="invalid-feedback">Estatura field cannot be blank!</div>
              </div> --}}
                {{-- <div class="col-md-2 mx-auto mt-2">
                <input class="form-control form-control-sm" type="text" name="RHDeportista" id="RHDeportista"
                  placeholder="RH" required>
                <div class="valid-feedback">RH field is valid!</div>
                <div class="invalid-feedback">RH field cannot be blank!</div>
              </div> --}}
                {{-- <div class="col-md-3 mx-auto mt-2">
                <input class="form-control form-control-sm" type="text" name="EPS" placeholder="EPS" required>
                <div class="valid-feedback">Eps field is valid!</div>
                <div class="invalid-feedback">Eps field cannot be blank!</div>
              </div> --}}
                <div class="col-md-4 mx-auto mt-2">
                  <input class="form-control form-control-sm" type="text" name="Departamento"
                    placeholder="Departamento" required>
                  <div class="valid-feedback">Departamento field is valid!</div>
                  <div class="invalid-feedback">Departamento field cannot be blank!</div>
                </div>
                <div class="col-md-4 mb-1 mt-2 text-center">
                  <select class="form-control form-control-sm" name="localidad" id="localidad" required>
                    <option value="" disabled selected>{{ __('Select a locality') }}</option>
                    @foreach ($localities as $locality)
                      <option value="{{ $locality->postal_code }}">{{ $locality->name }}</option>
                    @endforeach
                  </select>
                  <div class="valid-feedback mv-up">You selected a localidad!</div>
                  <div class="invalid-feedback mv-up">Please select a localidad!</div>
                </div>
                <div class="col-md-6 mx-auto mt-2">
                  <input class="form-control form-control-sm" type="text" name="Colegio" placeholder="Colegio"
                    required>
                  <div class="valid-feedback">Colegio field is valid!</div>
                  <div class="invalid-feedback">Colegio field cannot be blank!</div>
                </div>
                <div class="col-md-6 mx-auto mt-2">
                  <input class="form-control form-control-sm" type="number" name="Curso" placeholder="Curso"
                    required>
                  <div class="valid-feedback">Curso field is valid!</div>
                  <div class="invalid-feedback">Curso field cannot be blank!</div>
                </div>
                <div class="col-md-4 mx-auto mt-2">
                  <input class="form-control form-control-sm" type="number" name="numTelefonico"
                    placeholder="N° telefono" required>
                  <div class="valid-feedback">Telefono field is valid!</div>
                  <div class="invalid-feedback">Telefono field cannot be blank!</div>
                </div>
                <div class="col-md-4 mx-auto mt-2 mr-1">
                  <input class="form-control form-control-sm" type="number" name="numTelefonicoUno"
                    placeholder="N° telefono">
                  <div class="valid-feedback">Telefono field is valid!</div>
                  <div class="invalid-feedback">Telefono field cannot be blank!</div>
                </div>
                <div class="col-md-4 mx-auto mt-2 ">
                  <input class="form-control form-control-sm" type="number" name="numTelefonicoDos"
                    placeholder="N° telefono">
                  <div class="valid-feedback">Telefono field is valid!</div>
                  <div class="invalid-feedback">Telefono field cannot be blank!</div>
                </div>
                <div class="col-md-12 mt-2">
                  <input class="form-control" type="text" name="direccionDeportista"placeholder="Direccion" required>
                  <div class="valid-feedback">Direccion field is valid!</div>
                  <div class="invalid-feedback">Direccion field cannot be blank!</div>
                </div>
                <div class="col-md-6 mx-auto mt-2">
                  <input class="form-control" type="text" name="barrio"placeholder="Barrio" required>
                  <div class="valid-feedback">Barrio field is valid!</div>
                  <div class="invalid-feedback">Barrio field cannot be blank!</div>
                </div>
                <div class="col-md-6 mx-auto mt-2">
                  <input class="form-control" type="text" name="localidad"placeholder="Localidad" required>
                  <div class="valid-feedback">Localidad field is valid!</div>
                  <div class="invalid-feedback">Localidad field cannot be blank!</div>
                </div>
                <div class="col-md-3 col-sm-3 col-lg-3 mx-auto bg-danger ">
                  <div class="form-button mt-2 p-2 mx-auto">
                    <button id="submit" type="submit"
                      class="mx-auto btn btn-secondary ">{{ __('Add info') }}</button>
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
