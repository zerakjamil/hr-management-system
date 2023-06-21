<?php


namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index(Warehouse $warehouse): \Illuminate\Http\JsonResponse
    {

        $branches = $warehouse->branches()->paginate(20);

        return response()->json([
            'status' => 'success',
            'message' => '',
            'data' => $branches->through(function ($branch) {
                return [
                    'id' => $branch->id,
                    'warehouse_id' => $branch->warehouse_id,
                    'name' => $branch->name,
                    'created_at' => $branch->created_at,
                ];
            })
        ]);
    }

    public function show(Branch $branch)
    {

        return response()->json([
            'status' => 'success',
            'message' => '',
            'data' => [
                'id' => $branch->id,
                'name' => $branch->name,
                'address' => $branch->address,
                'profileLogo' => 'branch-logo.jpg',
                'created_at' => $branch->created_at

            ], 200]);
    }

}
