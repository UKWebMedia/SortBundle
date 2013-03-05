<?php
namespace Cannibal\Bundle\SortBundle\Sort;

use Cannibal\Bundle\SortBundle\Sort\Request\Fetcher\SortFetcher;
use Cannibal\Bundle\SortBundle\Form\Type\SortCollectionType;
use Cannibal\Bundle\SortBundle\Sort\Factory\SortCollectionFactory;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormFactoryInterface;


/**
 * Created by JetBrains PhpStorm.
 * User: adam
 * Date: 21/02/2013
 * Time: 14:31
 * To change this template use File | Settings | File Templates.
 */
class SortManager
{
    private $request;
    private $fetcher;
    private $formFactory;
    private $sortCollectionFactory;

    public function __construct(FormFactoryInterface $formFactory, SortFetcher $fetcher, SortCollectionFactory $sortFactory)
    {
        $this->fetcher = $fetcher;
        $this->formFactory = $formFactory;
        $this->sortCollectionFactory = $sortFactory;
    }

    public function setSortCollectionFactory(SortCollectionFactory $sortCollectionFactory)
    {
        $this->sortCollectionFactory = $sortCollectionFactory;
    }

    /**
     * @return \Cannibal\Bundle\SortBundle\Sort\Factory\SortCollectionFactory
     */
    public function getSortCollectionFactory()
    {
        return $this->sortCollectionFactory;
    }

    public function setFormFactory($formFactory)
    {
        $this->formFactory = $formFactory;
    }

    /**
     * @return \Symfony\Component\Form\FormFactoryInterface
     */
    public function getFormFactory()
    {
        return $this->formFactory;
    }

    public function setFetcher(SortFetcher $fetcher)
    {
        $this->fetcher = $fetcher;
    }

    public function getFetcher()
    {
        return $this->fetcher;
    }

    /**
     * @return \Cannibal\Bundle\SortBundle\Form\SortCollectionType
     */
    public function createSortCollectionType()
    {
        return new SortCollectionType();
    }


    /**
     * This function gets a sort collection from the request
     *
     * @param array $expectedSorts
     * @return \Cannibal\Bundle\SortBundle\Sort\SortCollectionInterface
     */
    public function getSorts(array $data, array $expectedSorts)
    {
        $fetcher = $this->getFetcher();
        $formFactory = $this->getFormFactory();

        $sorts = $fetcher->fetchSorts($data, $expectedSorts);

        $type = $this->createSortCollectionType();

        $sortSet = $this->getSortCollectionFactory()->createSortCollection();

        $form = $formFactory->create($type, $sortSet);

        $form->bind($sorts);

        return $form->getData();
    }
}
