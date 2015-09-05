<?php

class TraverserTest extends \PHPUnit_Framework_TestCase
{
    public function typeProvider()
    {
        return [
            ['array', 'array'],
            ['string', 'string'],
            ['boolean', 'bool'],
            ['number', 'numeric'],
            ['integer', 'int'],
            ['null', 'null'],
            ['object', 'object'],
        ];
    }

    /**
     * @dataProvider typeProvider
     */
    public function testRespondsWith($type, $internalType)
    {
        $schema = fetchFixture('./tests/fixtures/schemas/' . $type . '.json');
        $traverser = new JSONator\Traverser;

        $this->assertInternalType($internalType, $traverser->traverse($schema));
    }

    public function testRespondsWithRandomlySelectedEnum()
    {
        $schema = fetchFixture('./tests/fixtures/schemas/simple-enum.json');
        $traverser = new JSONator\Traverser;

        $this->assertEquals('test', $traverser->traverse($schema));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testFailsWithoutType()
    {
        $schema = fetchFixture('./tests/fixtures/schemas/simple-no-type.json');
        $traverser = new JSONator\Traverser;

        $traverser->traverse($schema);
    }

    /**
     * @expectedException JSONator\Exception\UnsupportedTypeException
     */
    public function testFailsWithInvalidType()
    {
        $schema = fetchFixture('./tests/fixtures/schemas/simple-unsupported-type.json');
        $traverser = new JSONator\Traverser;

        $traverser->traverse($schema);
    }
}