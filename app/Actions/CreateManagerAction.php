<?php

namespace App\Actions;

use App\DataTransferObjects\ManagerData;
use App\Models\User;

class CreateManagerAction
{
    /**
     * @param ManagerData $data
     * @return User
     */
    public function execute(ManagerData $data): User
    {
        return User::create(
            $data->only(
                'name',
                'email',
                'role',
                'password',
            )->toArray()
        );
    }
}
