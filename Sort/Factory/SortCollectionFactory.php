<?php
namespace Cannibal\Bundle\SortBundle\Sort\Factory;

use Cannibal\Bundle\SortBundle\Sort\SortCollection;

/**
 * Created by JetBrains PhpStorm.
 * User: adam
 * Date: 21/02/2013
 * Time: 14:49
 * To change this template use File | Settings | File Templates.
 */
class SortCollectionFactory
{
    /**
     * @return \Cannibal\Bundle\SortBundle\Sort\SortCollection
     */
    public function createSortCollection()
    {
        return new SortCollection();
    }
}
