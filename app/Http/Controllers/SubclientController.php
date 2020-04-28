<?php

namespace App\Http\Controllers;

use App\Client;
use App\Subclient;
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
        return view('clients.subclients.create', [
            'client' => $client
        ]);
    }

    public function store(Client $client, Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'app_id' => 'required|min:3'
        ]);

        $client->subclient()->create($validated);

        return redirect()->route('subclients.index', ['client' => $client])->with('success', 'A record has been created');
    }

    public function edit(Client $client, Subclient $subclient)
    {
        return view('clients.subclients.edit', ['client' => $client, 'subclient' => $subclient]);
    }

    public function update(Client $client, Subclient $subclient, Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'app_id' => 'required|min:3',
            'description' => 'nullable|min:3',
        ]);

        $subclient->update($validated);

        return redirect()->route('subclients.index', ['client' => $client])->with('success', 'The record has been updated');
    }
}
