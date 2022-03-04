<?php

namespace StaySafe\Password\Policy\Rule;

final class CommonPasswordRule implements RuleInterface
{
    private $frequency;

    public function __construct(int $frequency = 0)
    {
        $this->frequency = (new PositiveOccurrence($frequency))->getOccurrence();
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return sprintf(
            'Password should have at least %s special character%s',
            $this->frequency,
            $this->frequency !== 1 ? 's' : ''
        );
    }

    /**
     * @param string $value
     *
     * @return bool
     */
    public function isValid(string $value): bool
    {
        if ($this->frequency === 0) {
            return true;
        }

        $matches = [
            '12345678',
            '123456789',
            'qwerty',
            'password',
            'qwerty123',
            '11111111',
            '1234567890',
            'password1',
            'liverpool1',
            'liverpool'
        ];
        $count = 0;

        if (in_array($value, $matches)) {
            $count++;
        	return false;
        }

        return $count >= $this->frequency;
    }

    /**
     * Returns the rule as an associative array
     * self::class => rule.
     *
     * @return array
     */
    public function getRule(): array
    {
        return [self::class => $this->frequency];
    }
}
