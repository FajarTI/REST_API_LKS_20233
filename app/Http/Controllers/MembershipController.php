<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function index()
    {
        $memberships = Membership::all();

        return response()->json([
            'data' => $memberships,
            'message' => 'Successfully retrieved memberships.',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:20',
        ]);

        $membership = Membership::create($validatedData);

        return response()->json([
            'data' => $membership,
            'message' => 'Membership created successfully.',
        ], 201);
    }

    public function show($id)
    {
        $membership = Membership::findOrFail($id);

        return response()->json([
            'data' => $membership,
            'message' => 'Membership retrieved successfully.',
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:20',
        ]);

        $membership = Membership::findOrFail($id);
        $membership->update($validatedData);

        return response()->json([
            'data' => $membership,
            'message' => 'Membership updated successfully.',
        ], 200);
    }

    public function destroy($id)
    {
        $membership = Membership::find($id);

        if (!$membership) {
            return response()->json(['message' => 'Membership not found'], 404);
        }

        $membership->delete();

        return response()->json([
            'message' => 'Membership deleted successfully.',
        ]);
    }
}