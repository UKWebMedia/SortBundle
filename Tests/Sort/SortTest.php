<?php
namespace Cannibal\Bundle\SortBundle\Tests;

use PHPUnit_Framework_TestCase;

use Cannibal\Bundle\SortBundle\Sort\Sort,
    Cannibal\Bundle\SortBundle\Sort\SortInterface;

class SortTest extends PHPUnit_Framework_TestCase
{
    public function getSort()
    {
        return new Sort();
    }

    public function testDefaults()
    {
        $test = $this->getSort();

        $this->assertEquals(SortInterface::DIRECTION_DESC, $test->getDirection());
        $this->assertNull($test->getName());
    }

    public function testSetGetters()
    {
        $test = $this->getSort();

        $test->setName('test');
        $this->assertEquals($test->getName(), 'test');

        $test->setDirection(SortInterface::DIRECTION_DESC);
        $this->assertEquals(SortInterface::DIRECTION_DESC, $test->getDirection());

        $test->setDirection(SortInterface::DIRECTION_ASC);
        $this->assertEquals(SortInterface::DIRECTION_ASC, $test->getDirection());
    }
}
