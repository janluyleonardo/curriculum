<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CurrentlyPositionCheckbox extends Component
{
    public $currentlyPosition = false;
    public $endDateDisabled = false;
    public $experienceId;
    public $startDate;
    public $endDate;

    public function mount($startDate = null, $endDate = null, $currentlyPosition = false, $experienceId = null)
    {
        // dump($startDate, $endDate, $currentlyPosition); // Depuración
        $this->experienceId = $experienceId;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->currentlyPosition = $currentlyPosition;
        $this->endDateDisabled = $currentlyPosition;
    }

    public function updatedCurrentlyPosition($value)
    {
        $this->endDateDisabled = $value;
    }

    public function render()
    {
        return view('livewire.currently-position-checkbox');
    }
}
