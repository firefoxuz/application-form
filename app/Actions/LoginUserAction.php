<?php

namespace App\Actions;

class LoginUserAction
{
    /**
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function login(string $email, string $password): bool
    {
        return auth()->attempt([
            'email' => $email,
            'password' => $password,
        ]);
    }
}
