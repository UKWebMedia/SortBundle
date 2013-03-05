<?php
namespace Cannibal\Bundle\SortBundle\Tests\Sort;

use Cannibal\Bundle\SortBundle\Sort\SortCollection;
use Doctrine\Common\Collections\ArrayCollection;
use Cannibal\Bundle\SortBundle\Sort\SortInterface;

use PHPUnit_Framework_TestCase;


/**
 * Test class for the sort collection
 */
class SortCollectionTest extends PHPUnit_Framework_TestCase
{
    public function createSortCollection()
    {
        return new SortCollection();
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|\Symfony\Component\Validator\ExecutionContext
     */
    public function createExecutionContext($methods = array())
    {
        return $this->getMock('Symfony\\Component\\Validator\\ExecutionContext', $methods, array(), '', false);
    }

    public function testDefaults()
    {
        $test = $this->createSortCollection();

        $this->assertInstanceOf('Doctrine\\Common\\Collections\\ArrayCollection', $test->getSorts());
        $this->assertCount(0, $test->getSorts());
    }

    /**
     * @param array $methods
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    public function createSortInterfaceMock()
    {
        return $this->getMock('Cannibal\\Bundle\\SortBundle\\Sort\\SortInterface');
    }

    /**
     * @return \Cannibal\Bundle\SortBundle\Sort\SortCollection
     */
    public function testAddSort()
    {
        $test = $this->createSortCollection();

        $mock = $this->createSortInterfaceMock(array('getName'));
        $mock->expects($this->once())->method('getName')->will($this->returnValue('testName'));

        $test->addSort($mock);

        return $test;
    }

    public function testRemoveSort()
    {
        $test = $this->testAddSort();

        $this->assertCount(1, $test->getSorts());
        $test->removeSort('testName');
        $this->assertCount(0, $test->getSorts());
    }

    public function testContainsExpectedSortsNotValid()
    {
        $context = $this->createExecutionContext(array('addViolationAtPath'));
        $context->expects($this->once())->method('addViolationAtPath');

        $test = $this->createSortCollection();

        $mock = $this->createSortInterfaceMock(array('getName'));
        $mock->expects($this->atLeastOnce())->method('getName')->will($this->returnValue('testName'));

        $test->addSort($mock);
        $this->assertCount(1, $test->getSorts());

        $test->setExpectedSorts(array('otherSort'));

        $test->containsExpectedSorts($context);
    }
}
