<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientCredentialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, Client $client)
    {
        $request->validate([
            'credential' => 'required|file|mimetypes:application/json'
        ]);

        $file_path = $request->file('credential')->store('analytics');

        if (Storage::exists(storage_path('app/' . $client->google_credential))) {
            Storage::delete(storage_path('app/' . $client->google_credential));
        }

        $client->update([
            'google_credential' => $file_path,
            'google_credential_file_name' => $request->file('credential')->getClientOriginalName()
        ]);

        return redirect()->route('clients.edit', $client->id);
    }
}
