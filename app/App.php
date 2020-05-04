<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use RezuanKassim\BQAnalytic\Traits\BQApp\hasBQApp;

class App extends Model
{
    use hasBQApp;
    
    protected $guarded = [];

    protected $casts = [
        'bundles' => 'array'
    ];
}
