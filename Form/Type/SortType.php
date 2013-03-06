<?php

namespace Cannibal\Bundle\SortBundle\Form\Type;

use Symfony\Component\Form\AbstractType,
    Symfony\Component\Form\FormBuilderInterface,
    Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Cannibal\Bundle\SortBundle\Sort\SortInterface;

/**
 * Description of SortType
 */
class SortType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('direction', 'text', array('empty_data'=>SortInterface::DIRECTION_ASC))
                ->add('priority', 'integer')
                ->add('name', 'text');
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);
        $resolver->setDefaults(array(
            "data_class"=>'Cannibal\\Bundle\\SortBundle\\Sort\\Sort'
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
        return 'sort';
    }
}
