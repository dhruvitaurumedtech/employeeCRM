<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Datatable;
use Yajra\DataTables\DataTables;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $users =  User::select(['name', 'email']);
            return DataTables::of($users)->make(true);
        }
        return view("users/user");
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
        $roles=Role::paginate(2);
        return view('role/role_list',compact('roles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $id = $id;
        $roles = Role::find($id);
        return view('role/role_edit',compact('roles'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // print_r($request->all());exit; 
        $id = $request->id;
        $role = Role::find($id);
        $request->validate([
            'name' => [
                        'required',
                        'string',
                        'max:255',
                        Rule::unique('role', 'name')->ignore($id),
                    ],
        ]);
        
        $role->update([
            'name' => $request->name,
        ]);
        return redirect()->route('role.list')->with('success', 'Role Updated successfully');
    }
    public function updateStatus(Request $request, $id)
        {
            $validated = $request->validate([
                'status' => 'required|boolean',
            ]);

            $item = Role::findOrFail($id);
            $item->status = $request->input('status');
            $item->save();

            return response()->json(['message' => 'Role Updated successfully']);
        }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role_list = Role::find($id);
        if (!$role_list) {
            return redirect()->route('role.list')->with('error', 'Role not found');
        }
        $role_list->delete();
        return redirect()->route('role.list')->with('success', 'Role deleted successfully');
    }
}
