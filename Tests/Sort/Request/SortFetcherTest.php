<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mv
 * Date: 20/02/13
 * Time: 22:55
 * To change this template use File | Settings | File Templates.
 */

namespace Cannibal\Bundle\SortBundle\Tests\Sort\Request;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

use Cannibal\Bundle\SortBundle\Sort\Request\Fetcher\SortFetcher;
use PHPUnit_Framework_TestCase;



class SortFetcherTest extends PHPUnit_Framework_TestCase
{
    /**
     * @return \Cannibal\Bundle\SortBundle\Sort\Request\Fetcher\SortFetcher
     */
    public function createSortFetcher()
    {
        return new SortFetcher();
    }

    public function dataProviderTestExtraction()
    {
        return array(
            array(
                array(
                    'sortName,desc',
                    'sortName2,asc',
                ),
                array(
                    'sorts'=>array(
                        array(
                            'name'=>'sortName',
                            'direction'=>'desc',
                            'priority'=>0
                        ),
                        array(
                            'name'=>'sortName2',
                            'direction'=>'asc',
                            'priority'=>1
                        )
                    )
                )
            )
        );
    }

    /**
     * @dataProvider dataProviderTestExtraction
     */
    public function testExtraction($input, $expected)
    {
        $test = $this->createSortFetcher();
        $actual = $test->fetchSorts($input, array('sortName'));

        $this->assertEquals($expected, $actual);
    }

    public function testNoSorts()
    {
        $test = $this->createSortFetcher();

        $actual = $test->fetchSorts(array(), array('sortName'));

        $this->assertEquals(array(), $actual);
    }
}