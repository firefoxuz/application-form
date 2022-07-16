<?php

namespace App\DataTransferObjects;

use App\Http\Requests\RegisterRequest;
use Spatie\DataTransferObject\DataTransferObject;

class RegisterData extends DataTransferObject
{
    public string $email;

    public string $name;

    public string $password;

    public static function fromRequest(RegisterRequest $request): self
    {
        return new self([
            'email' => $request->email,
            'name' => $request->name,
            'password' => $request->password,
        ]);
    }
}
