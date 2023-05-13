<?php

namespace App\Http\Controllers;

use App\Models\ParkingData;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ParkingDataController extends Controller
{
    public function index()
    {
        $parkingData = ParkingData::all();

        return response()->json(['message' => 'Success', 'data' => $parkingData], Response::HTTP_OK);
    }

    public function show($id)
    {
        $parkingData = ParkingData::findOrFail($id);

        return response()->json(['message' => 'Success', 'data' => $parkingData], Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $request->validate([
            'license_plate' => 'required',
            'vehicle_id' => 'nullable|exists:vehicles,id',
            'employee_id' => 'required|exists:employees,id',
            'hourly_rates_id' => 'required|exists:hourly_rates,id',
            'datetime_in' => 'required|date',
            'datetime_out' => 'required|date',
            'amount_to_pay' => 'required|numeric',
        ]);

        $parkingData = ParkingData::create($request->all());

        return response()->json(['message' => 'Parking data created successfully', 'data' => $parkingData], Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'license_plate' => 'required',
            'vehicle_id' => 'nullable|exists:vehicles,id',
            'employee_id' => 'required|exists:employees,id',
            'hourly_rates_id' => 'required|exists:hourly_rates,id',
            'datetime_in' => 'required|date',
            'datetime_out' => 'required|date',
            'amount_to_pay' => 'required|numeric',
        ]);

        $parkingData = ParkingData::findOrFail($id);
        $parkingData->update($request->all());

        return response()->json(['message' => 'Parking data updated successfully', 'data' => $parkingData], Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $parkingData = ParkingData::findOrFail($id);
        $parkingData->delete();

        return response()->json(['message' => 'Parking data deleted successfully'], Response::HTTP_OK);
    }
}