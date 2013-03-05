<?php
namespace Cannibal\Bundle\SortBundle\Sort;

/**
 * Created by JetBrains PhpStorm.
 * User: mv
 * Date: 12/01/13
 * Time: 23:27
 * To change this template use File | Settings | File Templates.
 */
interface SortInterface
{
    const DIRECTION_ASC = 'asc';
    const DIRECTION_DESC = 'desc';

    public function getName();

    public function getDirection();
}
