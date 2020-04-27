<?php

namespace App\Http\Controllers;

use App\Client;
use App\Subclient;
use Illuminate\Http\Request;

class SubclientAnalyticController extends Controller
{
    public function index(Client $client, Subclient $subclient)
    {
        return view('clients.subclients.analytics.index', [
            'client' => $client,
            'subclient' => $subclient
        ]);
    }
}
