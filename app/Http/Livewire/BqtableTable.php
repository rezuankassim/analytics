<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use RezuanKassim\BQAnalytic\Models\BQTable;

class BqtableTable extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;

    public function clear()
    {
        $this->search = '';
    }

    public function render()
    {
        return view('livewire.bqtable-table', [
            'bqtables' => BQTable::where('table_date', 'like', '%' . $this->search . '%')->paginate($this->perPage)
        ]);
    }
}
