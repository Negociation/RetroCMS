<?php declare(strict_types=1);
/*
 * This file is part of sebastian/code-unit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SebastianBergmann\CodeUnit;

use PHPUnit\Framework\TestCase;
use SebastianBergmann\CodeUnit\Fixture\FixtureClass;
use SebastianBergmann\CodeUnit\Fixture\FixtureInterface;

/**
 * @covers \SebastianBergmann\CodeUnit\CodeUnitCollection
 * @covers \SebastianBergmann\CodeUnit\CodeUnitCollectionIterator
 *
 * @uses \SebastianBergmann\CodeUnit\CodeUnit
 *
 * @testdox CodeUnitCollection
 */
final class CodeUnitCollectionTest extends TestCase
{
    /**
     * @var InterfaceUnit
     */
    private $interface;

    /**
     * @var ClassUnit
     */
    private $class;

    protected function setUp(): void
    {
        $this->interface = CodeUnit::forInterface(FixtureInterface::class);
        $this->class     = CodeUnit::forClass(FixtureClass::class);
    }

    /**
     * @testdox Can be created from array of CodeUnit objects
     */
    public function testCanBeCreatedFromArrayOfObjects(): void
    {
        $collection = CodeUnitCollection::fromArray([$this->interface, $this->class]);

        $this->assertSame([$this->interface, $this->class], $collection->asArray());
    }

    /**
     * @testdox Can be created from list of CodeUnit objects
     */
    public function testCanBeCreatedFromListOfObjects(): void
    {
        $collection = CodeUnitCollection::fromList($this->interface, $this->class);

        $this->assertSame([$this->interface, $this->class], $collection->asArray());
    }

    public function testCanBeCounted(): void
    {
        $collection = CodeUnitCollection::fromList($this->interface, $this->class);

        $this->assertCount(2, $collection);
        $this->assertFalse($collection->isEmpty());
    }

    public function testCanBeIterated(): void
    {
        foreach (CodeUnitCollection::fromList($this->interface) as $key => $value) {
            $this->assertSame(0, $key);
            $this->assertSame($this->interface, $value);
        }
    }

    public function testCanBeMergedWithAnotherCollectionOfCodeUnitObjects(): void
    {
        $this->assertSame(
            [
                $this->class,
                $this->interface,
            ],
            CodeUnitCollection::fromList($this->class)->mergeWith(
                CodeUnitCollection::fromList($this->interface)
            )->asArray()
        );
    }
}
