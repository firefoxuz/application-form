<?php

namespace App\DataTransferObjects;

use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

abstract class BaseUserData extends DataTransferObject
{
    public string $email;

    public string $password;

    public string $name;

    public int $role;

    abstract public static function fromRequest(Request $request): self;
}
