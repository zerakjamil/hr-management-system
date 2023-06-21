<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index()
    {
        $warehouses = Warehouse::all();
        return response()->json($warehouses);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'location' => 'required',
        ]);

        $warehouse = Warehouse::create($validatedData);
        return response()->json($warehouse, 201);
    }

    public function show(Warehouse $warehouse)
    {
        return response()->json($warehouse);
    }

    public function update(Request $request, Warehouse $warehouse)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'location' => 'required',
        ]);

        $warehouse->update($validatedData);
        return response()->json($warehouse);
    }

    public function destroy(Warehouse $warehouse)
    {
        $warehouse->delete();
        return response()->json(null, 204);
    }
}
