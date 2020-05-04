<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RezuanKassim\BQAnalytic\Models\BQData;
use RezuanKassim\BQAnalytic\Models\BQTable;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('projects.index');
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|unique:projects,name',
            'google_project_id' => 'required|unique:projects,google_project_id',
            'google_bq_dataset_name' => 'required|unique:projects,google_bq_dataset_name',
            'credential' => 'required|file|mimetypes:application/json'
        ]);

        Project::create([
            'name' => $request->name,
            'google_project_id' => $request->google_project_id,
            'google_bq_dataset_name' => $request->google_bq_dataset_name,
            'google_credential_path' => $request->file('credential')->store('analytics'),
            'google_credential_file_name' => $request->file('credential')->getClientOriginalName()
        ]);

        return redirect()->route('projects.index')->with('success', 'A project has been created');
    }

    public function edit(Project $project)
    {
        return view('projects.edit', [
            'project' => $project
        ]);
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required|min:3',
            'google_project_id' => 'required',
            'google_bq_dataset_name' => 'required'
        ]);

        $project->update([
            'name' => $request->name,
            'google_project_id' => $request->google_project_id,
            'google_bq_dataset_name' => $request->google_bq_dataset_name
        ]);

        return redirect()->route('projects.edit', ['project' => $project->id])->with('success', 'The project has been updated');
    }

    public function destroy(Request $request, Project $project)
    {
        if ($request->name === $project->name) {
            BQTable::where('bqproject_name', $project->name)->delete();
            BQData::where('dataset', $project->google_bq_dataset_name)->delete();

            $project->bqapps->each(function ($value) {
                $value->update([
                    'project_id' => null
                ]);
            });
            
            if (Storage::exists($project->google_credential_path)) {
                Storage::delete($project->google_credential_path);
            }

            $project->delete();

            return redirect()->route('projects.index')->with('success', 'The project has been deleted');
        }

        return redirect()->route('projects.edit', ['project' => $project->id]);
    }
}
