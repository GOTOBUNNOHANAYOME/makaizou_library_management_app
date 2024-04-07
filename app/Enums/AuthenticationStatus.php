<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class AuthenticationStatus extends Enum
{
    const TEMPORARY = 0;
    const COMPLETED = 1;
    const FAILED = 2;
}
