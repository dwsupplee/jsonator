<?php

class GeneratorTest extends \PHPUnit_Framework_TestCase
{
    public function testGeneratesJSON()
    {
        $schema = fetchFixture('./tests/fixtures/schemas/simple-object-enum.json');
        $traverser = new JSONator\Traverser;
        $jsonGenerator = new JSONator\Generator($traverser);

        $this->assertJsonStringEqualsJsonFile(
            './tests/fixtures/json/simple.json', $jsonGenerator->generate($schema)
        );
    }
}