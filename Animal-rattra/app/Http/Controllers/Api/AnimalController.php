<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $animals = Animal::all();
        return response()->json($animals, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string',
            'categorie' => 'required|string',
            'status' => 'in:DISPONIBLE,ADOPTE,EN_SOIN'
        ]);

        $animal = Animal::create($validated);
        return response()->json($animal, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $animal = Animal::find($id);
        if (!$animal) {
            return response()->json(['message' => 'Animal not found'], 404);
        }
        return response()->json($animal, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $animal = Animal::find($id);
        if (!$animal) {
            return response()->json(['message' => 'Animal not found'], 404);
        }

        $validated = $request->validate([
            'status' => 'required|in:DISPONIBLE,ADOPTE,EN_SOIN'
        ]);

        $animal->update($validated);
        return response()->json($animal, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $animal = Animal::find($id);
        if (!$animal) {
            return response()->json(['message' => 'Animal not found'], 404);
        }
        $animal->delete();
        return response()->json(['message' => 'Animal deleted'], 200);
    }
}
