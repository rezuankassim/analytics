<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class SubclientController extends Controller
{
    public function index(Client $client)
    {
        return view('clients.subclients.index', [
            'client' => $client
        ]);
    }

    public function create(Client $client)
    {
        dd('hi');
    }
}
