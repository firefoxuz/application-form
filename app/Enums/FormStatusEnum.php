<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self answered()
 * @method static self waiting()
 */
class FormStatusEnum extends Enum
{
    protected static function values(): array
    {
        return [
            'waiting' => 1,
            'answered' => 2,
        ];
    }
}
