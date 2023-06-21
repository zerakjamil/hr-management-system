<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function __construct()
    {

    }

    public function index(): \Illuminate\Http\JsonResponse
    {
        $warehouses = Warehouse::orderBy('created_at', 'desc')->paginate(5);

        return response()->json([
            'status' => 'success',
            'message' => '',
            'data' => $warehouses->through(function ($warehouse) {
                return [
                    'id' => $warehouse->id,
                    'name' => $warehouse->name,
                    'created_at' => $warehouse->created_at,
                ];
            })
        ]);
    }

    public function show($warehouse): \Illuminate\Http\JsonResponse
    {

        $warehouse = Warehouse::find($warehouse);

        if ($warehouse) {
            return response()->json([
                'status' => 'success',
                'message' => 'Successfully retrieved.',
                'data' => [
                    'name' => $warehouse->name
                ]
            ], 404);
        }

        return response()->json([
            'status' => 'fail',
            'message' => 'Not found',
            'data' => [],
        ], 404);


    }

    public function store()
    {
        $validated = \request()->validate([
            'name' => 'required'
        ]);

        $warehouse = new Warehouse;
        $warehouse->create($validated);

        return 'done';
    }


    public function update($warehouseId)
    {
        $validated = \request()->validate([
            'name' => 'required'
        ]);

        $warehouse = Warehouse::find($warehouseId);

        if ($warehouse) {

            $warehouse->update([
                'name' => $validated['name'],
            ]);

            return 'updated';

        }

        return 'error doesnt exist';
    }

    public function destroy($warehouseId)
    {
        $warehouse = Warehouse::find($warehouseId);

        if ($warehouse) {

           $warehouse->delete();

            return 'deleted';

        }

        return 'error doesnt exist';
    }
}
