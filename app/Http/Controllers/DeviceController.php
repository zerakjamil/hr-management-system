<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function index(Warehouse $warehouse): \Illuminate\Http\JsonResponse
    {
        $devices = Device::whereHas('branch', function ($branch) use ($warehouse) {
            $branch->whereHas('warehouse', function ($query) use ($warehouse) {
                $query->where('id', $warehouse->id);
            });
        })->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Successfully retrieved',
            'data' => $devices->map(function ($device) {
                return [
                    'id' => $device->id,
                    'serial_number' => $device->serial_number,
                    'mac_address' => $device->mac_address,
                    'branch' => $device->branch,
                    'register_date' => $device->register_date,
                    'sold_date' => $device->sold_date,
                ];
            })
        ]);
    }

    public function search(): \Illuminate\Http\JsonResponse
    {

        $search = \request()->input('q', null);

        if (!$search) {
            return response()->json([
                'status' => 'error',
                'message' => 'Please provide a search term.',
                'data' => [],
                ], 402);
        }

        $devices = Device::where('serial_number', 'LIKE', '%' . $search . '%')
            ->orWhere('mac_address', 'LIKE', '%' . $search . '%')
            ->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Successfully retrieved',
            'data' => $devices->map(function ($device) {
                return [
                    'id' => $device->id,
                    'serial_number' => $device->serial_number,
                    'mac_address' => $device->mac_address,
                    'branch' => $device->branch,
                    'register_date' => $device->register_date,
                    'sold_date' => $device->sold_date,
                ];
            })
        ]);

    }

    public function getStatus(Device $device): \Illuminate\Http\JsonResponse
    {

        return response()->json([
            'status' => 'error',
            'message' => 'Successfully retrieved status.',
            'data' => [
                'status' => $device->status,
            ],
        ], 402);

    }

}
