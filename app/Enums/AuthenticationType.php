<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class AuthenticationType extends Enum
{
    const CREATE_USER = 0;
    const RESET_PASSWORD = 1;
}
