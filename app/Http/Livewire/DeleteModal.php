<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DeleteModal extends Component
{
    public $model;
    public $name;
    public $nameValid = false;
    public $deleteRoute;

    public function mount($model, $deleteRoute)
    {
        $this->model = $model;
        $this->deleteRoute = $deleteRoute;
    }

    public function updatedName()
    {
        if ($this->name === $this->model->name) {
            $this->nameValid = true;
        } else {
            $this->nameValid = false;
        }
    }

    public function clear()
    {
        $this->name = null;
        $this->nameValid = false;
    }

    public function render()
    {
        return view('livewire.delete-modal');
    }
}
