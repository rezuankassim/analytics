<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DeleteModal extends Component
{
    public $clientName;
    public $clientId;
    public $isOpen;
    public $name;
    public $nameValid = false;

    public function mount($client)
    {
        $this->clientId = $client->id;
        $this->clientName = $client->name;
    }

    public function updatedName()
    {
        if ($this->name === $this->clientName) {
            $this->nameValid = true;
        } else {
            $this->nameValid = false;
        }
    }

    public function render()
    {
        return view('livewire.delete-modal');
    }
}
