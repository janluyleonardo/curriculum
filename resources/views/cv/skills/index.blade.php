<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('skills') }}
    </h2>
  </x-slot>


  <div class="container mt-2 py-12">
    <!-- Botones de skills disponibles -->
    <div class="mb-4">
      {{-- <h4>{{ __('Available Skills') }}</h4> --}}
      <div class="d-flex flex-wrap gap-2">
        @foreach ($availableSkills as $skill)
          <button class="btn btn-sm btn-outline-primary skill-btn" data-skill-id="{{ $skill->id }}"
            {{ in_array($skill->id, $userSkillIds) ? 'disabled' : '' }}>
            {{ $skill->name }}
          </button>
        @endforeach
      </div>
      <h4 class="mt-2">{{ __('Selected Skills') }}</h4>
      <div class="mt-2 col-md-3" id="userSkillsList"></div>
      <form class="mt-2" id="saveSkillsForm" action="{{ route('skills.store') }}" method="POST">
        @csrf
        <!-- Inputs ocultos para cada skill seleccionada -->
        <div id="selectedSkillsContainer"></div>
        <button type="submit" class="btn btn-success" id="saveSkillsButton" disabled>Guardar Skills</button>

        @error('errors')
          <div class="col-md-12 text-center text-danger mb-3"><strong>{{ $message }}</strong></div>
        @enderror
      </form>
    </div>

    <!-- Lista de skills asignadas al usuario -->
    @if (count($availableSkills) >= 0)
      <div class="mb-4">
        <h4>{{ __('My Skills') }}</h4>
        <div class="row">
          @foreach ($availableSkills as $skill)
            @if (in_array($skill->id, $userSkillIds))
              <div class="col-md-3 mb-2">
                <div class="border rounded p-2 d-flex align-items-center justify-content-between">
                  {{ $skill->name }}
                  <input type="hidden" name="selected_skills[]" value="{{ $skill->id }}">
                  <form action="{{ route('skills.destroy', $skill) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class=" sombra btn btn-danger">
                      {{-- Eliminar registro --}}
                      <i class="bi bi-x-square"></i>
                    </button>
                  </form>
                </div>
              </div>
            @endif
          @endforeach
        </div>
      </div>
    @endif
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const skillButtons = document.querySelectorAll('.skill-btn');
      const userSkillsList = document.getElementById('userSkillsList');
      const selectedSkillsContainer = document.getElementById('selectedSkillsContainer');
      const saveSkillsButton = document.getElementById('saveSkillsButton');
      let selectedSkills = @json($userSkillIds);

      // Función para actualizar los inputs ocultos y el estado del botón
      function updateSelectedSkillsInputs() {
        selectedSkillsContainer.innerHTML = '';
        selectedSkills.forEach(skillId => {
          const input = document.createElement('input');
          input.type = 'hidden';
          input.name = 'selected_skills[]';
          input.value = skillId;
          selectedSkillsContainer.appendChild(input);
        });
        // Habilitar/deshabilitar el botón según si hay skills seleccionadas
        saveSkillsButton.disabled = selectedSkills.length === 0;
      }

      // Manejar clic en botones de skills
      skillButtons.forEach(button => {
        button.addEventListener('click', function() {
          const skillId = parseInt(this.getAttribute('data-skill-id'));
          const skillName = this.textContent;
          // Agregar a la lista de skills seleccionadas
          const listItem = document.createElement('li');
          listItem.className = 'list-group-item';
          listItem.innerHTML = `
        ${skillName}
        <button type="button" class="btn btn-sm btn-danger float-end remove-skill" data-skill-id="${skillId}">X</button>
      `;
          userSkillsList.appendChild(listItem);
          // Deshabilitar el botón
          this.disabled = true;
          // Agregar al array de skills seleccionadas
          if (!selectedSkills.includes(skillId)) {
            selectedSkills.push(skillId);
            updateSelectedSkillsInputs();
          }
        });
      });

      // Manejar eliminación de skills de la lista
      userSkillsList.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-skill')) {
          const skillId = parseInt(e.target.getAttribute('data-skill-id'));
          const listItem = e.target.closest('li');
          // Habilitar el botón nuevamente
          const button = document.querySelector(`.skill-btn[data-skill-id="${skillId}"]`);
          if (button) button.disabled = false;
          // Eliminar de la lista y del array
          listItem.remove();
          selectedSkills = selectedSkills.filter(id => id !== skillId);
          updateSelectedSkillsInputs();
        }
      });

      // Inicializar inputs ocultos con las skills ya seleccionadas
      updateSelectedSkillsInputs();
    });
  </script>

</x-app-layout>
