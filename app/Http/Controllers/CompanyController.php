<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $query = Company::query();
        // Search by company name
        if ($request->has('search') && $request->input('search') !== null) {
            $search = $request->input('search');
            $query->where('name', 'like', '%' . $search . '%');
        }

        // Filter by company type
        if ($request->has('type') && $request->input('type') !== null) {
            $query->where('type', $request->input('type'));
        }

        // Filter by company industry
        if ($request->has('industry') && $request->input('industry') !== null) {
            $query->where('industry', $request->input('industry'));
        }
        
        // Paginate the results
        $companies = $query->paginate(5);

        return response()->json($companies);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:companies',
            'description' => 'required',
            'email' => 'required|email',
            'number' => 'required',
            'address' => 'required',
            'img' => 'required',
        ]);

        $company = Company::create($request->all());
        return response()->json($company, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $company = Company::with('jobOffers')->find($id);
        if ($company) {
            return response()->json($company);
        }
        return response()->json(['message' => 'Company not found'], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|unique:companies',
            'description' => 'required',
            'email' => 'required|email',
            'number' => 'required',
            'address' => 'required',
            'img' => 'required',
        ]);
        $company = Company::find($id);
        if ($company) {
            $company->update($request->all());
            return response()->json($company);
        }
        return response()->json(['message' => 'Company not found'], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Company::find($id);
        if ($company) {
            $company->delete();
            return response()->json(['message' => 'Company deleted successfully']);
        }
        return response()->json(['message' => 'Company not found'], 404);    
    }

    public function getUniqueTypes()
    {
        $uniqueTypes = Company::select('type')->distinct()->get();
        return response()->json($uniqueTypes);
    }

    public function getUniqueIndustries()
    {
        $uniqueIndustries = Company::select('industry')->distinct()->get();
        return response()->json($uniqueIndustries);
    }
}
