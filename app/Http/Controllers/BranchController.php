<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::all();
        return response()->json($branches);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'warehouse_id' => 'required|exists:warehouses,id',
        ]);

        $branch = Branch::create($validatedData);
        return response()->json($branch, 201);
    }

    public function show(Branch $branch)
    {
        return response()->json($branch);
    }

    public function update(Request $request, Branch $branch)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'warehouse_id' => 'required|exists:warehouses,id',
        ]);

        $branch->update($validatedData);
        return response()->json($branch);
    }

    public function destroy(Branch $branch)
    {
        $branch->delete();
        return response()->json(null, 204);
    }
}
