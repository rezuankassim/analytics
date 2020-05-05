<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use RezuanKassim\BQAnalytic\Traits\BQClient\hasBQClient;
use Illuminate\Notifications\Notifiable;

class Client extends Model
{
    use hasBQClient;
    use Notifiable;

    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_logged_at' => 'datetime'
    ];

    protected $guarded = [];
}
