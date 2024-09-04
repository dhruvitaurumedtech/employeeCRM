<?php

use App\Models\Menu;

function getDynamicMenu()
{
$menus = Menu::join('permission', 'menu.id', '=', 'permission.menu_id')
        ->join('role', 'permission.role_id', '=', 'role.id')
        ->select('menu.*')
        ->where('permission.view', 1)
        ->where('role.id', Auth::user()->id)
        ->orderBy('menu.id', 'asc')
        ->get();
        // echo "<pre>";print_r($menus);exit;
        return $menus;
}