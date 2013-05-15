<?php
namespace Cannibal\Bundle\SortBundle\Sort;

use Cannibal\Bundle\SortBundle\Sort\SortInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\ExecutionContext;
use Cannibal\Bundle\SortBundle\Sort\SortCollectionInterface;

/**
 * This class represents a collection of sorts
 */
class SortCollection implements SortCollectionInterface
{
    private $sorts;
    private $expectedSorts;

    public function __construct()
    {
        $this->sorts = new ArrayCollection();
        $this->expectedSorts = array();
    }

    public function setExpectedSorts(array $expectedSorts)
    {
        $this->expectedSorts = $expectedSorts;
    }

    public function getExpectedSorts()
    {
        return $this->expectedSorts;
    }

    /**
     * @return ArrayCollection
     */
    public function getSorts()
    {
        return $this->sorts;
    }

    public function setSorts(ArrayCollection $sorts)
    {
        $this->sorts = $sorts;
    }

    public function removeSort($sortName)
    {
        $out = false;
        $sorts = $this->getSorts();
        foreach($sorts as $sort){
            /** @var SortInterface $sort */
            if($sort->getName() == $sortName){
                $sorts->removeElement($sort);
            }
        }
    }

    public function addSort(SortInterface $sort)
    {
        $this->getSorts()->add($sort);
    }

    public function hasSort($sortName)
    {
        $out = false;
        foreach($this->getSorts() as $sort){
            /** @var SortInterface $sort */
            if($sort->getName() == $sortName){
                $out = true;
            }
        }

        return $out;
    }

    /**
     * @param $sortName
     * @return \Cannibal\Bundle\SortBundle\Sort\SortInterface
     */
    public function getSort($sortName)
    {
        return $this->getSorts()->get($sortName);
    }

    public function containsExpectedSorts(ExecutionContext $context)
    {
        $sorts = $this->getSorts();
        $expectedSorts = $this->getExpectedSorts();

        foreach($sorts as $sort){
            /** @var SortInterface $sort */
            if(!in_array($sort->getName(), $expectedSorts)){
                $context->addViolationAt('sorts', sprintf('Sort %s is not expected', $sort->getName()));
            }
        }
    }
}
