<?php

namespace FusionGrup\Bundle\RedBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RespuestasComentarioType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('contenido')
            ->add('estRespuestaComentario')
            ->add('fkUsuario')
            ->add('fkTipoComentario')
            ->add('fkComentario')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FusionGrup\Bundle\RedBundle\Entity\RespuestasComentario'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'fusiongrup_bundle_redbundle_respuestascomentario';
    }
}
