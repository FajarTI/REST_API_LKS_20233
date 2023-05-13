<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();

        return response()->json(['data' => $members]);
    }

    public function show($id)
    {
        $member = Member::findOrFail($id);

        return response()->json(['data' => $member]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'membership_id' => 'required|exists:memberships,id',
            'name' => 'required',
            'email' => 'required|email|unique:members,email',
            'phone_number' => 'required',
            'address' => 'required',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:Male,Female',
        ]);

        $member = Member::create($request->all());

        return response()->json(['data' => $member], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'membership_id' => 'required|exists:memberships,id',
            'name' => 'required',
            'email' => 'required|email|unique:members,email,' . $id,
            'phone_number' => 'required',
            'address' => 'required',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:Male,Female',
        ]);

        $member = Member::findOrFail($id);
        $member->update($request->all());

        return response()->json(['data' => $member]);
    }

    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();

        return response()->json(['message' => 'Member deleted successfully']);
    }
}