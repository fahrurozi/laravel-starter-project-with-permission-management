<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as SpatieRole;
use Flasher\Prime\Notification\NotificationBuilder;

class Role extends SpatieRole
{
    //
    public static function boot()
    {
        parent::boot();
        self::deleting(function ($role) {
            if ($role->name === 'super_admin' || $role->name === 'admin' || $role->name === 'user') {
                app('flasher')->addError('Role ' . $role->name . ' Tidak Bisa Dihapus.');
                return false;
            }
        });
    }

}
