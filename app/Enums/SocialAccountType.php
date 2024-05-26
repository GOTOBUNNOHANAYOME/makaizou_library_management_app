<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class SocialAccountType extends Enum
{
    const GITHUB = 'github';
    const GOOGLE = 'google';
    const X = 'twitter';
}
