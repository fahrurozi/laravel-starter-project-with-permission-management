<?php

namespace App\Repositories\Eloquent;

use App\Models\Role;
use App\Models\User;
use App\Repositories\Contracts\RoleRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;


class RoleRepository implements RoleRepositoryInterface
{
    public function getAll(){
        return Role::all();
    }

    public function getById(int $id){
        return Role::find($id);
    }

    public function create(array $data){
        return Role::create($data);
    }

    public function update(int $id, array $data){
        $role = $this->getById($id);
        $role->update($data);

        return $role;
    }

    public function delete(int $id){
        return Role::destroy($id);
    }
}
