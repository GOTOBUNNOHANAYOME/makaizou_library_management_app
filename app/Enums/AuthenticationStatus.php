<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class AuthenticationStatus extends Enum
{
    const TEMPORARY = 0;
    const COMPLETED = 1;
    const FAILED = 2;
}
