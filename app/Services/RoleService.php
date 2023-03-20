<?php

namespace App\Services;

use App\Repositories\Contracts\RoleRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Services\Contracts\RoleServiceInterface;
use App\Services\Contracts\UserServiceInterface;

class RoleService implements RoleServiceInterface
{
    protected $roleRepository;

    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function getAll()
    {
        return $this->roleRepository->getAll();
    }

    public function getById(int $id)
    {
        return $this->roleRepository->getById($id);
    }

    public function create(array $data)
    {
        return $this->roleRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->roleRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->roleRepository->delete($id);
    }
}
