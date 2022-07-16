<?php

namespace App\DataTransferObjects;

use App\Enums\RoleEnum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * @property string $email
 * @property string $password
 * @property string $name
 * @property RoleEnum $role
 */
class ManagerData extends BaseUserData
{
    public string $email;

    public string $password;

    public string $name;

    public int $role;

    public static function fromArray(array $user): BaseUserData
    {
        return new self([
            'name' => $user['name'],
            'email' => $user['email'],
            'password' => Hash::make($user['password']),
            'role' => RoleEnum::manager()->value
        ]);
    }

    public static function fromRequest(Request $request): BaseUserData
    {
        return new self([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'role' => RoleEnum::manager()->value
        ]);
    }
}
