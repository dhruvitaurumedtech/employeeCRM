<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    function permission(Request $request ,$roleId){

        $menu=Menu::all();
        $permissions = Permission::where('role_id', $roleId)
                    ->get()
                    ->groupBy('menu_id')
                    ->map(function ($permissionGroup) {
                        return [
                            'add' => $permissionGroup->where('add', '1')->isNotEmpty() ? '1' : '0',
                            'edit' => $permissionGroup->where('edit', '1')->isNotEmpty() ? '1' : '0',
                            'view' => $permissionGroup->where('view', '1')->isNotEmpty() ? '1' : '0',
                            'delete' => $permissionGroup->where('delete', '1')->isNotEmpty() ? '1' : '0',
                        ];
                    });
        return view('permission/create',compact('roleId','menu','permissions'));

    }
    public function storePermissions(Request $request, $roleId)
    {
        
        
        foreach ($request->input('permissions', []) as $menuId => $permission) {
            Permission::updateOrCreate(
                ['role_id' => $roleId, 'menu_id' => $menuId],
                [
                    'add' => isset($permission['add']) ? '1' : '0',
                    'edit' => isset($permission['edit']) ? '1' : '0',
                    'view' => isset($permission['view']) ? '1' : '0',
                    'delete' => isset($permission['delete']) ? '1' : '0',
                ]
            );
        }
    
        return redirect()->back()->with('success', 'Permissions updated successfully!');
   }
}
