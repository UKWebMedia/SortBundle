<?php
namespace Cannibal\Bundle\SortBundle\Sort\Factory;

use Cannibal\Bundle\SortBundle\Sort\Sort;

/**
 * Created by JetBrains PhpStorm.
 * User: adam
 * Date: 21/02/2013
 * Time: 14:48
 * To change this template use File | Settings | File Templates.
 */
class SortFactory
{
    /**
     * @return \Cannibal\Bundle\SortBundle\Sort\Sort
     */
    public function createSort()
    {
        return new Sort();
    }
}
