<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('role_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        echo "<pre>";print_r($request->all());exit;
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:0,1', // Assuming status is an enum with values '0' or '1'
        ]);

        // Create a new role with validated data
        $role = Role::create($validatedData);

        // Return a JSON response indicating success
        return response()->json([
            'message' => 'Role created successfully!',
            'role' => $role
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
