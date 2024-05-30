<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplicantExperience;
use App\Models\Applicant;
class ApplicantExperienceController extends Controller
{
    public function index($applicantId)
    {
        $applicant = Applicant::findOrFail($applicantId);
        return response()->json($applicant->experiences, 200);
    }

    public function store(Request $request, $applicantId)
    {
        $applicant = Applicant::findOrFail($applicantId);

        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'location' => 'required|string',
            'role' => 'required|string',
            'start_year' => 'required|integer',
            'end_year' => 'required|integer',
            'skills_and_tools' => 'required|string',
        ]);

        $experience = new ApplicantExperience($validated);
        $applicant->experiences()->save($experience);

        return response()->json($experience, 201);
    }

    public function show($applicantId, $id)
    {
        $experience = ApplicantExperience::where('applicant_id', $applicantId)->findOrFail($id);
        return response()->json($experience, 200);
    }

    public function update(Request $request, $applicantId, $id)
    {
        $experience = ApplicantExperience::where('applicant_id', $applicantId)->findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'location' => 'required|string',
            'role' => 'required|string',
            'start_year' => 'required|integer',
            'end_year' => 'required|integer',
            'skills_and_tools' => 'required|string',
        ]);

        $experience->update($validated);
        return response()->json($experience, 200);
    }

    public function destroy($applicantId, $id)
    {
        $experience = ApplicantExperience::where('applicant_id', $applicantId)->findOrFail($id);
        $experience->delete();
        return response()->json(['message' => 'Experience deleted'], 200);
    }
}
