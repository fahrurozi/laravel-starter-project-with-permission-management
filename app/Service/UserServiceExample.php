<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Services\Contracts\UserServiceInterface;

class UserService implements UserServiceInterface
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getById(int $id)
    {
        return $this->userRepository->getById($id);
        // if (! $user) {
        //     throw new CustomException('User not found', 404);
        // }

        // return $user;

        // try {
        //     $user = $userService->getUser($id);
        //     return view('user.show', compact('user'));
        // } catch (CustomException $e) {
        //     return response()->json([
        //         'message' => $e->getMessage(),
        //     ], $e->getCode());
        // }
    }

    public function create(array $data)
    {
        return $this->userRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->userRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->userRepository->delete($id);
    }
}
