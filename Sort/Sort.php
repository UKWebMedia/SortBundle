<?php
namespace Cannibal\Bundle\SortBundle\Sort;

use Cannibal\Bundle\SortBundle\Sort\SortInterface;

/**
 * Represents a sort field
 */
class Sort implements SortInterface
{
    private $name;
    private $direction;
    private $priority;

    public function __construct()
    {
        $this->name = null;
        $this->direction = SortInterface::DIRECTION_DESC;
        $this->priority = 0;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDirection()
    {
        return $this->direction;
    }

    public function setDirection($direction)
    {
        $this->direction = $direction;
    }

    public function getPriority()
    {
        return $this->priority;
    }

    public function setPriority($priority)
    {
        $this->priority = $priority;
    }
}
