<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\IoTData;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class IoTDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $data = IoTData::orderBy('detected_at', 'desc')->get();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'detected_at' => 'required|date',
            'mode' => 'required|integer',
            'area' => 'required|integer',
        ]);

        $data = IoTData::create($validated);
        return response()->json($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $data = IoTData::findOrFail($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $validated = $request->validate([
            'detected_at' => 'sometimes|date',
            'mode' => 'sometimes|integer',
            'area' => 'sometimes|integer',
        ]);

        $data = IoTData::findOrFail($id);
        $data->update($validated);
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $data = IoTData::findOrFail($id);
        $data->delete();
        return response()->json(['message' => 'Data deleted successfully']);
    }
}
