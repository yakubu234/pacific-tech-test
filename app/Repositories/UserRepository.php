<?php

namespace App\Repositories;

use App\Models\User;
use App\Interfaces\UserRepositoryInterface;

/**
 * Class UserRepository.
 */
class UserRepository implements UserRepositoryInterface
{
    /**
     * @return string
     *  Return the model
     */
    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function findById($id)
    {
        return $this->model->find($id);
    }
}
