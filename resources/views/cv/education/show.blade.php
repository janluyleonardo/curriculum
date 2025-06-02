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
              <div class="col-md-3 ">{{ __('Education information') }}</div>
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
                {{ $education->description }}<br>
                <span style="font-size: 0.75em;">{{ __('Description degree') }}</span>
              </div>
              <div class="col-md-2 mx-auto mt-2 text-center">
                {{ $education->startDate }}<br>
                <span style="font-size: 0.75em;">{{ __('Start date') }}</span>
              </div>
              @if ($education->endDate)
                <div class="col-md-2 mx-auto mt-2 text-center">
                  {{ $education->endDate }}<br>
                  <span style="font-size: 0.75em;">{{ __('End date') }}</span>
                </div>
              @endif
              <div class="col-md-3 mx-auto mt-2 text-center">
                {{ $education->institution }}<br>
                <span style="font-size: 0.75em;">{{ __('Institution') }}</span>
              </div>
              <div class="col-md-2 mx-auto mt-2 text-center">
                {{ $education->degree }}<br>
                <span style="font-size: 0.75em;">{{ __('Degree') }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
