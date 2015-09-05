<?php

namespace JSONator\Primitives;

use Faker\Generator;
use stdClass;

class NumberPrimitive
{
    /**
     * @param Generator $faker
     * @return null
     */
    public function __construct(Generator $faker)
    {
        $this->faker = $faker;
    }

    /**
     * @param stdClass $schema
     * @return string
     */
    public function __invoke()
    {
        return $this->faker->randomNumber;
    }
}