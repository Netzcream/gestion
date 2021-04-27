<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\FormBuilderInterface;

use App\Entity\Correo;
class CorreoType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options): void
	{
		$entity = $builder->getData();
		$builder->add('email', 
			EmailType::class,[
				'label' => $options['label'],
				'help' => $options['help'],
				'required' => $options['required'],
				"attr" => [
					'placeholder' => $options['placeholder'],
				]
			]

		);

	}


	public function configureOptions(OptionsResolver $resolver) {
		$resolver->setDefaults(array(
			'data_class' => Correo::class,
			'label' => null,
			'placeholder' => null,
			'help' => null,
			'required' => false,
		));
	}

}