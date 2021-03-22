<?php
namespace CSRU\CSRUBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ImageType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('file','file', array('required'=>false,
            'label'=>'Photo'));
            //->add('name')
            //->add('path')
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array('data_class' => 'CSRU\CSRUBundle\Entity\Image'));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'csru_csrubundle_image';
    }
}
