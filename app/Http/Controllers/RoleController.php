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
        return view('role/role_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:role,name|string|max:255',
            'status' => 'required|in:0,1', // Assuming status is an enum with values '0' or '1'
        ]);

        $role = Role::create($validatedData);

        return redirect()->route('role.list')->with('success', 'Role Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function list()
    {
        $roles=Role::all();
        return view('role/role_list',compact('roles'));
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
