<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function index()
    {
        $devices = Device::all();
        return response()->json($devices);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'branch_id' => 'required|exists:branches,id',
        ]);

        $device = Device::create($validatedData);
        return response()->json($device, 201);
    }

    public function show(Device $device)
    {
        return response()->json($device);
    }

    public function update(Request $request, Device $device)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'branch_id' => 'required|exists:branches,id',
        ]);

        $device->update($validatedData);
        return response()->json($device);
    }

    public function destroy(Device $device)
    {
        $device->delete();
        return response()->json(null, 204);
    }
}
