<?php

namespace Cannibal\Bundle\SortBundle\Form\Type;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilderInterface,
    Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Cannibal\Bundle\SortBundle\Form\Type\SortType;

/**
 * Description of SortType
 */
class SortCollectionType extends AbstractType
{
    public function createSortType()
    {
        return new SortType();
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('sorts', 'collection', array(
            'type' => $this->createSortType(),
            'empty_data'=>new ArrayCollection(),
            'by_reference'=>false,
            'allow_add'=>true,
            'allow_delete'=>true,
        ));
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);
        $resolver->setDefaults(array(
            "data_class"=>'Cannibal\\Bundle\\SortBundle\\Sort\\SortCollection'
        ));
        return $resolver;
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'sort_collection';
    }
}
