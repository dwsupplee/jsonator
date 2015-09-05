<?php

namespace JSONator;

use Faker\Factory as FakerFactory;
use JSONator\Exception\UnsupportedTypeException;
use JSONator\Traverser;
use JSONator\Primitives;
use stdClass;

Class Traverser
{
    /**
     * @param stdClass $schema
     * @param Traverser $traverser
     * @return string|bool|int|float|stdClass|array|null
     */
    public function traverse(stdClass $schema)
    {
        if (!isset($schema->type)) {
            throw new \InvalidArgumentException('"type" is currently required.');
        }

        if (isset($schema->enum)) {
            return $schema->enum[rand(0, count($schema->enum) - 1)];
        }

        switch ($schema->type) {
            case 'string':
                $primitive = new Primitives\StringPrimitive(FakerFactory::create());
                break;
            case 'boolean':
                $primitive = new Primitives\BooleanPrimitive(FakerFactory::create());
                break;
            case 'number':
                $primitive = new Primitives\NumberPrimitive(FakerFactory::create());
                break;
            case 'integer':
                $primitive = new Primitives\IntegerPrimitive(FakerFactory::create());
                break;
            case 'object':
                $primitive = new Primitives\ObjectPrimitive($this);
                break;
            case 'array':
                $primitive = new Primitives\ArrayPrimitive($this);
                break;
            case 'null':
                $primitive = new Primitives\NullPrimitive();
                break;
            default:
                throw new UnsupportedTypeException(
                    sprintf('Unknown type: %s', $schema->type)
                );
        }

        return $primitive($schema);
    }
}