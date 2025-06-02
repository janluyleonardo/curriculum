<!-- livewire/currently-position-checkbox.blade.php -->

<div>
  <div class="row">
    <div class="col-md-3 mx-auto mb-1 mt-2 text-center">
      <input class="form-control form-control-sm mt-2 @error('startDate') is-invalid @enderror" type="date"
        name="startDate" id="startDate" value="{{ old('startDate') == null ? $startDate : old('startDate') }}" required>
      {{-- <input class="form-control form-control-sm mt-2 @error('startDate') is-invalid @enderror" type="date"
        name="startDate" id="startDate" value="{{ $startDate }}" required> --}}
      <span style="font-size: 0.75em;">Fecha de inicio</span>
      <div class="valid-feedback mv-up">You selected a fecha de inicio!</div>
      <div class="invalid-feedback mv-up">Please select a fecha de inicio!</div>
      @error('startDate')
        <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>

    @if ($experienceId && $endDate)
      <div class="col-md-3 mt-2">
        <div class="form-check">
          <input class="form-check-input form-control-sm" type="checkbox" id="currentlyPosition"
            wire:model="currentlyPosition">
          <label class="form-check-label form-control-sm" for="currentlyPosition">¿Currently position?</label>
        </div>
      </div>

      <div class="col-md-3 mx-auto mb-1 mt-2 text-center">
        <input class="form-control form-control-sm mt-2 @error('endDate') is-invalid @enderror" type="date"
          name="endDate" id="endDate" value="{{ old('endDate') == null ? $endDate : old('endDate') }}"
          @if ($endDateDisabled) disabled @endif>
        <span style="font-size: 0.75em;">Fecha de finalizacion</span>
        <div class="valid-feedback mv-up">You selected a fecha de finalización!</div>
        <div class="invalid-feedback mv-up">Please select a fecha de finalización!</div>
        @error('endDate')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
    @else
      <div class="col-md-3 mt-2">
        <div class="form-check">
          <input class="form-check-input form-control-sm" type="checkbox" id="currentlyPosition"
            wire:model="currentlyPosition">
          <label class="form-check-label form-control-sm" for="currentlyPosition">¿Currently position?</label>
        </div>
      </div>

      <div class="col-md-3 mx-auto mb-1 mt-2 text-center">
        <input class="form-control form-control-sm mt-2 @error('endDate') is-invalid @enderror" type="date"
          name="endDate" id="endDate" value="{{ old('endDate') }}" @if ($endDateDisabled) disabled @endif>
        <span style="font-size: 0.75em;">Fecha de finalizacion</span>
        <div class="valid-feedback mv-up">You selected a fecha de finalización!</div>
        <div class="invalid-feedback mv-up">Please select a fecha de finalización!</div>
        @error('endDate')
          <div class="text-danger">{{ $message }}</div>
        @enderror
      </div>
    @endif
  </div>
</div>
