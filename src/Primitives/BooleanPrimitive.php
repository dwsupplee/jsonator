<?php

namespace JSONator\Primitives;

use Faker\Generator;

class BooleanPrimitive
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
     * @return bool
     */
    public function __invoke()
    {
        return $this->faker->boolean(50);
    }
}