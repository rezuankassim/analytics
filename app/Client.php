<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use RezuanKassim\BQAnalytic\Traits\hasClientFromDB;
use RezuanKassim\BQAnalytic\Traits\hasMorphClient;
use RezuanKassim\BQAnalytic\Traits\hasSubclient;

class Client extends Model
{
    use hasClientFromDB;
    use hasSubclient;
    use hasMorphClient;

    protected $guarded = ['created_at', 'updated_at', 'id'];

    protected $casts = [
        'status' => 'boolean'
    ];
}
