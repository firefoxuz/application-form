<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self user()
 * @method static self manager()
 */
class RoleEnum extends Enum
{
    protected static function values(): array
    {
        return [
            'user' => 1,
            'manager' => 2,
        ];
    }
}
