<?php

namespace JSONator\Primitives;

use JSONator\Traverser;
use stdClass;

class ArrayPrimitive
{
    const MIN_ITEMS = 0;
    const MAX_ITEMS = 4;

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
     * @return array
     */
    public function __invoke(stdClass $value)
    {
        $data = [];
        $minItems = isset($value->minItems) ? $value->minItems : self::MIN_ITEMS;
        $maxItems = isset($value->maxItems) ? $value->maxItems : $minItems + self::MAX_ITEMS;
        $itemCount = rand($minItems, $maxItems); //until http://php.net/manual/en/function.random-int.php

        for ($i = 0; $i < $itemCount; $i++) {
            $data[] = $this->traverser->traverse($value->items);
        }

        return $data;
    }
}