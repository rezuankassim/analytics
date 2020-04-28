<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use RezuanKassim\BQAnalytic\Traits\hasMorphClient;

class Subclient extends Model
{
    use hasMorphClient;
    
    protected $guarded = [];
}
