<?php

namespace JSONator\Primitives;

use JSONator\Traverser;
use stdClass;

class ObjectPrimitive
{
    /**
     * @param Traverser $traverser
     * @return null
     */
    public function __construct(Traverser $traverser)
    {
        $this->traverser = $traverser;
    }

    /**
     * @param stdClass $value
     * @return stdClass
     */
    public function __invoke($value)
    {
        $data = new stdClass();

        $requiredProperties = isset($value->required) ? $value->required : [];

        foreach ($value->properties as $property => $value) {
            if (in_array($property, $requiredProperties)) {
                $data->$property = $this->traverser->traverse($value);
            }

            if (rand(0, 1) === 1) {
                $data->$property = $this->traverser->traverse($value);
            }
        }

        return $data;
    }
}