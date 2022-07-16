<?php

namespace App\Actions;

use App\DataTransferObjects\RegisterData;
use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StoreRegisterAction
{
    /**
     * @param RegisterData $data
     * @return User
     */
    public function execute(RegisterData $data): User
    {
        return User::create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => Hash::make($data->password),
            'role' => RoleEnum::user()->value
        ]);
    }
}
