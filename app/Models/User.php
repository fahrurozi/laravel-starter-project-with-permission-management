<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // menyebabkan password ke hash 2x
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function canAccessMenu($menuName): bool
    {
        // Menggunakan koleksi untuk menyimpan semua nama menu yang bisa diakses pengguna
        $accessibleMenus = new Collection();

        // Mencari nama menu yang bisa diakses pengguna berdasarkan role yang dimiliki
        foreach ($this->roles as $role) {
            foreach ($role->menuPermissions as $menuPermission) {
                if ($menuPermission->menu_name === $menuName) {
                    $accessibleMenus->push($menuName);
                }
            }
        }

        // Mengembalikan apakah pengguna memiliki akses ke menu yang dimaksud
        return $accessibleMenus->contains($menuName);
    }
}
