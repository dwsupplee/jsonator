<?php

namespace JSONator;

use JSONator\Traverser;
use stdClass;

class Generator
{
    /**
     * @var Traverser $traverser
     */
    private $traverser;

    /**
     * @param Traverser $traverser
     * @return null
     */
    public function __construct(Traverser $traverser)
    {
        $this->traverser = $traverser;
    }

    /**
     * @param stdClass $schema
     * @return string
     */
    public function generate(stdClass $schema)
    {
        return json_encode($this->traverser->traverse($schema));
    }
}