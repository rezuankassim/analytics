<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientAnalyticController extends Controller
{
    public function index(Client $client)
    {
        return view('clients.analytics.index', [
            'client' => $client
        ]);
    }
}
