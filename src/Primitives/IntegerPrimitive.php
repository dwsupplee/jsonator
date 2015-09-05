<?php

namespace JSONator\Primitives;

use Faker\Generator;

class IntegerPrimitive
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
     * @return int
     */
    public function __invoke()
    {
        return $this->faker->randomNumber;
    }
}