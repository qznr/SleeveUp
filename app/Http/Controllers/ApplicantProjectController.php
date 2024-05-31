<?php

namespace App\Http\Controllers;

use App\Models\ApplicantProject;
use App\Models\Applicant;
use Illuminate\Http\Request;

class ApplicantProjectController extends Controller
{
    public function index($applicantId)
    {
        $applicant = Applicant::findOrFail($applicantId);
        return response()->json($applicant->projects, 200);
    }

    public function store(Request $request, $applicantId)
    {
        $applicant = Applicant::findOrFail($applicantId);

        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'type' => 'required|string',
            'start_month' => 'required|integer',
            'start_year' => 'required|integer',
            'end_month' => 'required|integer',
            'end_year' => 'required|integer',
            'link' => 'sometimes|url',
        ]);

        $project = new ApplicantProject($validated);
        $applicant->projects()->save($project);

        return response()->json($project, 201);
    }

    public function show($applicantId, $id)
    {
        $project = ApplicantProject::where('applicant_id', $applicantId)->findOrFail($id);
        return response()->json($project, 200);
    }

    public function update(Request $request, $applicantId, $id)
    {
        $project = ApplicantProject::where('applicant_id', $applicantId)->findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'type' => 'required|string',
            'start_month' => 'required|integer',
            'start_year' => 'required|integer',
            'end_month' => 'required|integer',
            'end_year' => 'required|integer',
            'link' => 'sometimes|url',
        ]);

        $project->update($validated);
        return response()->json($project, 200);
    }

    public function destroy($applicantId, $id)
    {
        $project = ApplicantProject::where('applicant_id', $applicantId)->findOrFail($id);
        $project->delete();
        return response()->json(['message' => 'Project deleted'], 200);
    }
}