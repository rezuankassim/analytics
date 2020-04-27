<?php

namespace App\Http\Livewire;

use App\Client;
use App\Subclient;
use Livewire\Component;
use Livewire\WithPagination;

class SubclientTable extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    public $client;

    public function mount(Client $client)
    {
        $this->client = $client;
    }

    public function clear()
    {
        $this->search = '';
    }

    public function render()
    {
        return view('livewire.subclient-table', [
            'subclients' => Subclient::where('name', 'like', '%'.$this->search.'%')->paginate($this->perPage)
        ]);
    }

    public function paginationView()
    {
        return 'livewire.client-pagination-links-view';
    }
}
