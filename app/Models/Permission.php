<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'permission';
    protected $fillable = [
        'role_id',
        'menu_id',
        'add',
        'edit',
        'view',
        'delete'
    ];
}
