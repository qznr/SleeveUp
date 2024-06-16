<?php

namespace App\Http\Controllers;
use App\Models\JobOffer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class JobOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $query = JobOffer::with(['company', 'profession']);

        // Search by job profession name
        if ($request->has('search') && $request->input('search') !== null) {
            $search = $request->input('search');
            $query->whereHas('profession', function($q) use ($search) {
                $q->where('name', 'LIKE', '%' . $search . '%');
            });
        }

        // Filter by remote status
        if ($request->has('remote') && $request->input('remote') !== null) {
            $query->where('is_remote', $request->input('remote'));
        }

        // Filter by job type
        if ($request->has('type') && $request->input('type') !== null) {
            $query->where('type', $request->input('type'));
        }
        $jobOffers = $query->paginate(5);
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

        public function getUniqueIsRemote()
    {
        $uniqueIsRemote = JobOffer::select('is_remote')->distinct()->get();
        return response()->json($uniqueIsRemote);
    }

    public function getUniqueTypes()
    {
        $uniqueTypes = JobOffer::select('type')->distinct()->get();
        return response()->json($uniqueTypes);
    }

}
