<?php

namespace App\Http\Livewire\Project\ReferenceValue;

use App\Models\Infraestructure;
use App\Models\InfraestructureType;
use Livewire\Component;

class Activity extends Component
{
    public $lst_infraestructures, $lst_infraestructure_types;
    public $infraestructure_types = [];

    public function render()
    {
        return view('livewire.project.reference-value.activity',
            [
                'infraestructures' => Infraestructure::all(),
            ]
        );
    }

    public function updatedlstInfraestructures($infraestructure_id){
        $this->emit($infraestructure_id);
        $this->infraestructure_types = InfraestructureType::where('infraestructure_id', $infraestructure_id)->get();
    }
}
