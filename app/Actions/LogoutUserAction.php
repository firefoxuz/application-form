<?php

namespace App\Actions;

class LogoutUserAction
{
    /**
     * @return void
     */
    public function logout(): void
    {
        auth()->logout();
    }
}
