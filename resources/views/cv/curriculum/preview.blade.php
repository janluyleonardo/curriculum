<x-app-layout>
  <x-slot name="header">
    <nav class="navbar bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand">Generar mi currículum </a>
        <form class="d-flex" role="search">
          <a class="btn btn-outline-danger" href="{{ route('curriculum.pdf') }}">PDF</a>
          {{-- <a class="btn btn-outline-success" href="{{ route('curriculum.pdf')}}">Excel</a> --}}
          {{-- <a class="btn btn-outline-info" href="{{ route('curriculum.pdf')}}">Word</a> --}}
        </form>
      </div>
    </nav>
  </x-slot>

  <div class="container pt-6">
    <!-- About-->
    <section class="resume-section" id="about">
      <div class="resume-section-content">
        <h1 class="mb-0">
          {{ Str::title($about->name) ?? 'Nombre del Usuario' }}
          {{-- <span class="text-primary">Moreno Coronado</span> --}}
        </h1>
        <div class="subheading mb-5">
          {{ $about->address }} · {{ Str::title($about->barrio) }}, {{ $about->locality->name }} · {{ $about->phone }} ·
          <a href="mailto:name@email.com">{{ $about->user->email }}</a>
        </div>
        <p class="lead mb-5">
          {{ $about->personalProfile }}
        </p>
        <div class="social-icons mb-2 justify-items-center">
          @if (isset($about->social_media_links) && !empty($about->social_media_links))
            @foreach ($about->social_media_links as $network => $url)
              @if (!empty($url))
                <a class="social-icon" href="{{ $url }}" target="_blank">
                  @switch($network)
                    @case('linkedin')
                      <i class="bi bi-linkedin"></i>
                    @break

                    @case('github')
                      <i class="bi bi-github"></i>
                    @break

                    @case('twitter')
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-twitter-x" viewBox="0 0 16 16">
                        <path
                          d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z" />
                      </svg>
                    @break

                    @case('facebook')
                      <i class="bi bi-facebook"></i>
                    @break

                    @case('instagram')
                      <i class="bi bi-github"></i>
                    @break

                    @default
                      <!-- Icono por defecto si no coincide con ninguno -->
                  @endswitch
                </a>
              @endif
            @endforeach
          @endif
        </div>
      </div>
    </section>
    <hr class="m-0" />
    <!-- Experiences-->
    <section class="resume-section" id="experience">
      <div class="resume-section-content">
        <h2 class="mb-5">{{ __('experience') }}</h2>
        @forelse ($experiences as $experience)
          <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
            <div class="flex-grow-1">
              <h3 class="mb-0 text-black">
                <strong>
                  {{ Str::upper($experience->position) }}
                </strong>
              </h3>
              <div class="subheading mb-3">
                <strong>
                  {{ $experience->company }}
                </strong>
              </div>
              <p>{{ $experience->functions }}</p>
            </div>
            <div class="flex-shrink-0">
              <span class="text-primary">{{ $experience->startDate }} -
                {{ $experience->endDate ? $experience->endDate : __('present') }}</span>
            </div>
          </div>
        @empty
          <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
            No registra experiencias.
          </div>
        @endforelse
      </div>
    </section>
    <hr class="m-0" />
    <!-- Education-->
    <section class="resume-section" id="education">
      <div class="resume-section-content">
        <h2 class="mb-5">Education</h2>
        @forelse ($educations as $education)
          <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
            <div class="flex-grow-1">
              <h3 class="mb-0">{{ $education->institution }}</h3>
              <div class="subheading mb-3">{{ $education->degree }}</div>
              <div>Computer Science - Web Development Track</div>
              <p>GPA: 4.23</p>
            </div>
            <div class="flex-shrink-0">
              <span class="text-primary">Febrary 2017 - Present</span>
            </div>
          </div>
        @empty
          <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
            No registra experiencias.
          </div>
        @endforelse
        <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
          <div class="flex-grow-1">
            <h3 class="mb-0">Liceo Reynel </h3>
            <div class="subheading mb-3">Bachiller académico</div>
            <p>GPA: 4.36</p>
          </div>
          <div class="flex-shrink-0">
            <span class="text-primary">January 1999 - October 2005</span>
          </div>
        </div>
        <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
          <div class="flex-grow-1">
            <h3 class="mb-0">Liceo Reynel</h3>
            <div class="subheading mb-3">Básica Primaria</div>
            <p>GPA: 4.46</p>
          </div>
          <div class="flex-shrink-0">
            <span class="text-primary">January 1993 - October 1999</span>
          </div>
        </div>
      </div>
    </section>
    <hr class="m-0" />
    <!-- Skills-->
    <section class="resume-section" id="skills">
      <div class="resume-section-content">
        <h2 class="mb-5">Skills</h2>
        <div class="subheading mb-3">Programming Languages & Tools</div>
        <div class="subheading mb-3">Front-end</div>
        <ul class="list-inline dev-icons">
          <li class="list-inline-item"><i class="fab fa-html5"></i></li>
          <li class="list-inline-item"><i class="fab fa-css3-alt"></i></li>
          <li class="list-inline-item"><i class="fab fa-js-square"></i></li>
          <li class="list-inline-item"><i class="fab fa-angular"></i></li>
          <!-- <li class="list-inline-item"><i class="fab fa-react"></i></li> -->
          <li class="list-inline-item"><i class="fab fa-node-js"></i></li>
          <li class="list-inline-item"><i class="fab fa-sass"></i></li>
          <li class="list-inline-item"><i class="fab fa-less"></i></li>
        </ul>
        <div class="subheading mb-3">Back-end</div>
        <ul class="list-inline dev-icons">
          <li class="list-inline-item"><i class="fab fa-java"></i></li>
          <!-- <li class="list-inline-item"><i class="fab fa-gulp"></i></li> -->
          <li class="list-inline-item"><i class="fab fa-php"></i></li>
          <li class="list-inline-item"><i class="fab fa-npm"></i></li>
        </ul>
        <div class="subheading mb-3">Workflow</div>
        <ul class="fa-ul mb-0">
          <li>
            <span class="fa-li"><i class="fas fa-check"></i></span>
            Mobile-First, Responsive Design
          </li>
          <li>
            <span class="fa-li"><i class="fas fa-check"></i></span>
            Cross Browser Testing & Debugging
          </li>
          <li>
            <span class="fa-li"><i class="fas fa-check"></i></span>
            Cross Functional Teams
          </li>
          <li>
            <span class="fa-li"><i class="fas fa-check"></i></span>
            Agile Development & Scrum
          </li>
        </ul>
      </div>
    </section>
    <hr class="m-0" />
    <!-- Interests-->
    <section class="resume-section" id="interests">
      <div class="resume-section-content">
        <h2 class="mb-5">Interests</h2>
        <p>
          Mi principal proyecto es culminar mis logros académicos siendo un ingeniero de sistemas que actúe
          de forma destacada, en el ámbito de la informática y el desarrollo de software, para mi progreso
          personal, familiar y profesional, así mismo brindar a mi familia y amigos lo mejor de mí, siempre
          conservando la humildad y el liderazgo con el cual me caracterizo.
        </p>
        <p class="mb-0">
          Estando en casa me gusta ver series de tv con mi familia jugar call of dutty en mi consola de play 4,
          escuchar musica mas que todo la salsa es al que mas me llama la atencion pero cuando estoy realizando
          trabajos en mi computador escucho musica suave como jazz o rock.
        </p>
      </div>
    </section>
    <hr class="m-0" />
    <!-- Awards-->
    <section class="resume-section" id="awards">
      <div class="resume-section-content">
        <h2 class="mb-5">Awards & Certifications</h2>
        <ul class="fa-ul mb-0">
          <li>
            <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
            DIPLOMATE
            DEVELOPMENT OF OBJECT ORIENTED SOFTWARE APPLICATIONS WITH JAVA
          </li>
          <li>
            <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
            RPA Developer Advanced
          </li>
          <li>
            <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
            RPA Developer Intermediated
          </li>
          <li>
            <span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>
            RPA Developer Basic
          </li>
        </ul>
      </div>
    </section>
  </div>
</x-app-layout>
