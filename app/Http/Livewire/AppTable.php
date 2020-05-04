<?php

namespace App\Http\Livewire;

use App\App;
use Livewire\Component;
use Livewire\WithPagination;

class AppTable extends Component
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
        $query = App::where('name', 'like', '%' . $this->search . '%');

        if ($this->client) {
            $query = $query->where('client_id', $this->client->id);
        }

        return view('livewire.app-table', [
            'apps' => $query->paginate($this->perPage)
        ]);
    }

    public function paginationView()
    {
        return 'livewire.table-pagination-links-view';
    }
}
