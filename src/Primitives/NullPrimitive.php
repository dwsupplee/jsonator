<?php

namespace JSONator\Primitives;

class NullPrimitive
{
    /**
     * @return null
     */
    public function __invoke()
    {
        return null;
    }
}