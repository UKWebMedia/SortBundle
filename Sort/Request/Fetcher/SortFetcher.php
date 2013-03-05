<?php
namespace Cannibal\Bundle\SortBundle\Sort\Request\Fetcher;

use Symfony\Component\HttpFoundation\Request;

/**
 * Class SortFetcher
 *
 * SortFetcher transforms the request value if present in to something that is compatible with an SF form
 */
class SortFetcher
{
    public function fetchSorts(array $data, array $expectedSorts = array())
    {
        $out = array();
        foreach ($data as $priority => $value) {
            if(preg_match('/^(\w+),(asc|desc)$/', $value, $matches)){
                $field = $matches[1];
                $direction = $matches[2];

                $out['sorts'][] = array(
                    'name'=>$field,
                    'direction'=>$direction,
                    'priority'=>$priority,
                );
            }
        }

        return $out;
    }
}