<?php

namespace App\Http\Controllers;
use App\Models\JobOffer;

use Illuminate\Http\Request;

class JobOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobOffers = JobOffer::with(['company', 'profession'])->paginate(5);;
        return response()->json($jobOffers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'profession_id' => 'required|exists:professions,id',
            'company_id' => 'required|exists:companies,id',
            'description' => 'required|string',
            'salary' => 'required|string',
            'requirement' => 'required|string',
            'is_remote' => 'required|string',
            'type' => 'required|string'
        ]);

        $jobOffer = JobOffer::create($request->all());
        return response()->json($jobOffer, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jobOffer = JobOffer::with(['company', 'profession'])->find($id);
        if ($jobOffer) {
            return response()->json($jobOffer);
        }
        return response()->json(['message' => 'Job offer not found'], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jobOffer = JobOffer::find($id);
        if ($jobOffer) {
            $request->validate([
                'profession_id' => 'required|exists:professions,id',
                'company_id' => 'required|exists:companies,id',
                'description' => 'required|string',
                'salary' => 'required|string',
                'requirement' => 'required|string',
                'is_remote' => 'required|string',
                'type' => 'required|string'
            ]);

            $jobOffer->update($request->all());
            return response()->json($jobOffer);
        }
        return response()->json(['message' => 'Job offer not found'], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jobOffer = JobOffer::find($id);
        if ($jobOffer) {
            $jobOffer->delete();
            return response()->json(['message' => 'Job offer deleted successfully']);
        }
        return response()->json(['message' => 'Job offer not found'], 404);
    }
}
