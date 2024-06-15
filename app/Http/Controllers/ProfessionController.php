<?php

namespace App\Http\Controllers;
use App\Models\Profession;

use Illuminate\Http\Request;

class ProfessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $professions = Profession::all();
        return response()->json($professions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:professions|max:255',
            'description' => 'required|string'
        ]);

        $profession = Profession::create($request->all());
        return response()->json($profession, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $profession = Profession::find($id);
        if ($profession) {
            return response()->json($profession);
        }
        return response()->json(['message' => 'Profession not found'], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $profession = Profession::find($id);
        if ($profession) {
            $request->validate([
                'name' => 'required|string|max:255|unique:professions,name,' . $id,
                'description' => 'required|string'
            ]);

            $profession->update($request->all());
            return response()->json($profession);
        }
        return response()->json(['message' => 'Profession not found'], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $profession = Profession::find($id);
        if ($profession) {
            $profession->delete();
            return response()->json(['message' => 'Profession deleted successfully']);
        }
        return response()->json(['message' => 'Profession not found'], 404);
    }
}
