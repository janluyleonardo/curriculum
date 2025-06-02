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
              <div class="col-md-3 ">{{ __('Experience information') }}</div>
              <div class="col-md-3 "></div>
              <div class="col-md-3 "></div>
              <div class="col-md-3 text-end">
                <a href="{{ url()->previous() }}">{{ __('back') }}</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 mx-auto mt-2 text-center">
                {{ $experience->functions }}<br>
                <span style="font-size: 0.75em;">{{ __('Functions performed') }}</span>
              </div>
              <div class="col-md-2 mx-auto mt-2 text-center">
                {{ $experience->startDate }}<br>
                <span style="font-size: 0.75em;">{{ __('Start date') }}</span>
              </div>
              @if ($experience->endDate)
                <div class="col-md-2 mx-auto mt-2 text-center">
                  {{ $experience->endDate }}<br>
                  <span style="font-size: 0.75em;">{{ __('End date') }}</span>
                </div>
              @endif
              <div class="col-md-3 mx-auto mt-2 text-center">
                {{ $experience->position }}<br>
                <span style="font-size: 0.75em;">{{ __('Position') }}</span>
              </div>
              <div class="col-md-2 mx-auto mt-2 text-center">
                {{ $experience->company }}<br>
                <span style="font-size: 0.75em;">{{ __('Company') }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
