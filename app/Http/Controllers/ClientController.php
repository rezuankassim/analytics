<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('clients.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'displayName' => 'required|min:3',
            'projectId' => 'required',
            'bqDataset' => 'required',
            'credential' => 'required|file|mimetypes:application/json'
        ]);

        $file_path = $request->file('credential')->store('analytics');

        Client::create([
            'name' => $request->name,
            'display_name' => $request->displayName,
            'description' => $request->description,
            'google_project_id' => $request->projectId,
            'google_bq_dataset_name' => $request->bqDataset,
            'google_credential' => $file_path,
            'google_credential_file_name' => $request->file('credential')->getClientOriginalName(),
            'status' => true,
        ]);

        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('clients.edit', [
            'client' => $client
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|min:3',
            'display_name' => 'sometimes|required|min:3',
            'google_project_id' => 'sometimes|required',
            'google_bq_dataset_name' => 'sometimes|required',
        ]);

        $client->update($validated);

        return redirect()->route('clients.edit', $client->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Client $client)
    {
        if ($request->name === $client->name) {
            $client->delete();
        }

        return redirect()->route('clients.index');
    }
}
