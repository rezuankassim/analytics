<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use RezuanKassim\BQAnalytic\Traits\BQClient\hasBQClient;

class Client extends Model
{
    use hasBQClient;

    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_logged_at' => 'datetime'
    ];

    protected $guarded = [];
}
