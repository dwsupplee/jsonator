<?php

namespace JSONator\Primitives;

use Faker\Generator;
use stdClass;

class StringPrimitive
{
    const MIN_LENGTH = 0;
    const MAX_LENGTH = 15;
    const IPSUM_LENGTH = 35;
    const RANDOM_REGEX = '[A-Za-z0-9._%+-]';

    /**
     * @param Generator $faker
     * @return null
     */
    public function __construct(Generator $faker)
    {
        $this->faker = $faker;
    }

    /**
     * @param stdClass $value
     * @return string
     */
    public function __invoke(stdClass $value)
    {
        if (isset($value->pattern)) {
            return $this->faker->regexify($value->pattern);
        }

        if (isset($value->minLength) || isset($value->maxLength)) {
            $minLength = isset($value->minLength) ? $value->minLength : self::MIN_LENGTH;
            $maxLength = isset($value->maxLength) ? $value->maxLength : $minLength + self::MAX_LENGTH;
            $length = rand($minLength, $maxLength);

            return $this->faker->regexify(sprintf('%s{%s}', self::RANDOM_REGEX, $length));
        }

        return $this->faker->text(rand(5, self::IPSUM_LENGTH));
    }
}