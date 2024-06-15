<?php

namespace App\Http\Controllers;

use App\Models\ApplicantCertificate;
use App\Models\Applicant;
use Illuminate\Http\Request;

class ApplicantCertificateController extends Controller
{
    public function index($applicantId)
    {
        $applicant = Applicant::findOrFail($applicantId);
        return response()->json($applicant->certificates, 200);
    }

    public function store(Request $request, $applicantId)
    {
        $applicant = Applicant::findOrFail($applicantId);

        $validated = $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'start_month' => 'required|string',
            'start_year' => 'required|integer',
            'end_month' => 'required|string',
            'end_year' => 'required|integer',
            'skills' => 'sometimes|string',
            'tools' => 'sometimes|string',
            'link' => 'sometimes|string',
        ]);

        $certificate = new ApplicantCertificate($validated);
        $applicant->certificates()->save($certificate);

        return response()->json($certificate, 201);
    }

    public function show($applicantId, $id)
    {
        $certificate = ApplicantCertificate::where('applicant_id', $applicantId)->findOrFail($id);
        return response()->json($certificate, 200);
    }

    public function update(Request $request, $applicantId, $id)
    {
        $certificate = ApplicantCertificate::where('applicant_id', $applicantId)->findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'start_month' => 'required|string',
            'start_year' => 'required|integer',
            'end_month' => 'required|string',
            'end_year' => 'required|integer',
            'skills' => 'sometimes|string',
            'tools' => 'sometimes|string',
            'link' => 'sometimes|string',
        ]);

        $certificate->update($validated);
        return response()->json($certificate, 200);
    }

    public function destroy($applicantId, $id)
    {
        $certificate = ApplicantCertificate::where('applicant_id', $applicantId)->findOrFail($id);
        $certificate->delete();
        return response()->json(['message' => 'Certificate deleted'], 200);
    }
}
