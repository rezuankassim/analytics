<?php

namespace App\Http\Livewire;

use App\Client;
use Livewire\Component;
use Livewire\WithPagination;

class ClientTable extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    public $client;

    public function clear()
    {
        $this->search = '';
    }

    public function render()
    {
        return view('livewire.client-table', [
            'clients' => Client::where('name', 'like', '%' . $this->search . '%')->paginate($this->perPage)
        ]);
    }

    public function paginationView()
    {
        return 'livewire.table-pagination-links-view';
    }
}
