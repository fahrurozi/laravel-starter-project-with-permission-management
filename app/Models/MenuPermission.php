<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuPermission extends Model
{
    //
    protected $table = 'menu_permissions';

    protected $fillable = ['menu_name', 'menu_url', 'permission_name'];
}
