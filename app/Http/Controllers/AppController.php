<?php

namespace App\Http\Controllers;

use App\App;
use App\Client;
use App\Project;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        return view('apps.index');
    }

    public function create(Request $request)
    {
        return view('apps.create', [
            'projects' => Project::all(),
            'clients' => $request->client ? Client::where('id', $request->client)->get() : Client::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'client' => 'required|exists:clients,id',
            'project' => 'required|exists:projects,id',
            'bundles' => 'required'
        ]);

        App::create([
            'name' => $request->name,
            'client_id' => $request->client,
            'project_id' => $request->project,
            'bundles' => array_filter(explode(', ',$request->input('bundles')))
        ]);

        return redirect()->route('apps.index')->with('success', 'An app has been created');
    }

    public function edit(Request $request, App $app)
    {
        return view('apps.edit', [
            'projects' => Project::all(),
            'clients' => Client::all(),
            'app' => $app
        ]);
    }

    public function update(Request $request, App $app)
    {
        $request->validate([
            'name' => 'required|min:3',
            'client' => 'required|exists:clients,id',
            'project' => 'required|exists:projects,id',
            'bundles' => 'required'
        ]);

        $app->update([
            'name' => $request->name,
            'client_id' => $request->client,
            'project_id' => $request->project,
            'bundles' => array_filter(explode(', ', $request->input('bundles')))
        ]);

        return redirect()->route('apps.edit', ['app' => $app->id])->with('success', 'The app has been updated');
    }

    public function destroy(Request $request, App $app)
    {
        if ($request->name === $app->name) {
            $app->delete();

            return redirect()->route('apps.index')->with('success', 'The app has been deleted');
        }

        return redirect()->route('apps.edit', ['app' => $app->id]);
    }
}
