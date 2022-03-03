<?php

namespace StaySafe\Password\Policy\Unit\Rule;

use PHPUnit\Framework\TestCase;
use StaySafe\Password\Policy\Rule\CommonPasswordRule;

class CommonPasswordTest extends TestCase
{
    public function testIsValidMatchesCommonPassword(): void
    {
        $rule = new CommonPasswordRule(1);

        static::assertFalse($rule->isValid('123456'));
    }
}
