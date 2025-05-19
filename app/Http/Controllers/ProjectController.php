<?php

namespace App\Http\Controllers;

use App\Models\PortfolioProject;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function createProject(Request $request)
    {
        $incomingFields = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'projectUrl' => 'nullable|url',
            'image' => 'required|url',
            'status' => 'required|in:draft,published',
        ]);
        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['description'] = strip_tags($incomingFields['description']);

        PortfolioProject::create($incomingFields);
    }

    public function viewProject($id)
    {
        $project = PortfolioProject::find($id);

        if (!$project) {
            return response("Project with ID $id does not exist.", 404);
        }

        return view('edit', ['project' => $project]);
    }

    public function updateProject(Request $request, $id)
    {
        $project = PortfolioProject::find($id);

        if (!$project) {
            return response("Project with ID $id does not exist.", 404);
        }

        $incomingFields = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'projectUrl' => 'nullable|url',
            'image' => 'required|url',
            'status' => 'required|in:draft,published',
        ]);

        // Optional: sanitize text fields
        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['description'] = strip_tags($incomingFields['description']);

        $project->update($incomingFields);

        return redirect('/edit/' . $id)->with('success', 'Project updated successfully!');
    }

    public function deleteProject($id)
    {
        $project = PortfolioProject::find($id);
        if (!$project) {
            return response("Project with ID $id does not exist.", 404);
        }

        $project->delete();

        return redirect('/')->with('success', 'Project deleted successfully!');
    }

    public function listProjects()
    {
        $projects = PortfolioProject::all();
        return view('list', ['projects' => $projects]);
    }
}
