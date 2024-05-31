<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        return response()->json(Applicant::all(), 200);
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'bio' => 'required|string',
            'status' => 'required|string',
            'about_me' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $applicant = Applicant::create($validated);

        return response()->json($applicant, 201);
    }

    // Display the specified resource.
    public function show($id)
    {
        $applicant = Applicant::find($id);

        if ($applicant) {
            return response()->json($applicant, 200);
        } else {
            return response()->json(['message' => 'Applicant not found'], 404);
        }
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'bio' => 'sometimes|string',
            'status' => 'sometimes|string|in:Looking for work,Looking for investor,Looking for partner',
            'about_me' => 'sometimes|string',
            'description' => 'sometimes|string',
        ]);

        $applicant = Applicant::with([
            'experiences',
            'certificates',
            'projects'
        ])->find($id);

        if ($applicant) {
            $applicant->update($validated);
            return response()->json($applicant, 200);
        } else {
            return response()->json(['message' => 'Applicant not found'], 404);
        }
    }
}
