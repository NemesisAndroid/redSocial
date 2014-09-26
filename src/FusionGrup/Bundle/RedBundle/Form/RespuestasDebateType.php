<?php

namespace FusionGrup\Bundle\RedBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RespuestasDebateType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('contenido')
            ->add('estRespuestaDebate')
            ->add('fkUsuario')
            ->add('fkDebate')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FusionGrup\Bundle\RedBundle\Entity\RespuestasDebate'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'fusiongrup_bundle_redbundle_respuestasdebate';
    }
}
