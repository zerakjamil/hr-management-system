<?php


namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Device;
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

    public function show(Branch $branch): \Illuminate\Http\JsonResponse
    {

        $soldDevicesCount = Device::where('branch_id', $branch->id)
            ->whereNotNull('sold_date')
            ->count();

        $remainingDevicesCount = Device::where('branch_id', $branch->id)
            ->whereNull('sold_date')
            ->count();


        return response()->json([
            'status' => 'success',
            'message' => '',
            'data' => [
                'id' => $branch->id,
                'name' => $branch->name,
                'address' => $branch->address,
                'profileLogo' => 'branch-logo.jpg',
                'sold' => $soldDevicesCount,
                'remaining' => $remainingDevicesCount,
                'created_at' => $branch->created_at,

            ], 200]);
    }

}
