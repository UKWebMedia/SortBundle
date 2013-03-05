<?php
namespace Cannibal\Bundle\SortBundle\Sort;

interface SortCollectionInterface
{
    public function setExpectedSorts(array $expected);

    /**
     * @return array
     */
    public function getExpectedSorts();

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getSorts();

    /**
     * @param $sortName
     * @return \Cannibal\Bundle\SortBundle\Sort\SortInterface
     */
    public function getSort($sortName);

    /**
     * @param $sortName
     * @return bool
     */
    public function hasSort($sortName);

    /**
     * This function removes a sort with the name provided
     *
     * @param $sortName
     * @return mixed
     */
    public function removeSort($sortName);

    /**
     * This function adds a sort to the collection
     *
     * @param SortInterface $sort
     * @return mixed
     */
    public function addSort(SortInterface $sort);
}
