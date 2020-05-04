<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectCredentialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(Request $request, Project $project)
    {   
        $request->validate([
            'credential' => 'required|file|mimetypes:application/json'
        ]);

        $file_path = $request->file('credential')->store('analytics');

        if (Storage::exists($project->google_credential_path)) {
            Storage::delete($project->google_credential_path);
        }

        $project->update([
            'google_credential_path' => $file_path,
            'google_credential_file_name' => $request->file('credential')->getClientOriginalName()
        ]);

        return redirect()->route('projects.edit', $project->id)->with('success', 'Project\'s google credentials have been updated');
    }
}
