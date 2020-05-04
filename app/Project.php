<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use RezuanKassim\BQAnalytic\Traits\BQProject\hasApps;

class Project extends Model
{
    use hasApps;
    
    protected $guarded = [];
}
