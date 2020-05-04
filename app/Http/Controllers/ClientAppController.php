<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientAppController extends Controller
{
    public function index(Client $client)
    {
        return view('clients.apps.index', ['client' => $client]);
    }
}
