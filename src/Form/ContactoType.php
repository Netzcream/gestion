<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\FormBuilderInterface;

use App\Entity\TipoDocumento;
use App\Entity\Genero;
use App\Entity\Pais;
use App\Entity\EstadoCivil;

class ContactoType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options): void
	{
		$entity = $builder->getData();
		$builder->add('nombre', 
			TextType::class,[
				'label' => "Nombre",
				'help' => "Por favor, ingrese su nombre",
				"attr" => [
					'placeholder' => "Ingresar su nombre",
				]
			]

		);
		$builder->add('apellido', 
			TextType::class,[
				'label' => "Apellido",
				'help' => "Por favor, ingrese su apellido",
				"attr" => [
					'placeholder' => "Ingresar su apellido",
				]
			]
		);

		$builder->add('fecha_nacimiento', 
			DateType::class,[
				'label' => "Fecha de Nacimiento",
				'help' => "Seleccione su fecha de nacimiento",
				'widget' => 'single_text',
				"html5" => true,
				"attr" => [
					'placeholder' => "",
				]
			]
		);
		$builder->add('tipo_documento', 
			EntityType::class, [
				'class' => TipoDocumento::class,
				'label' => "Tipo de Documento",
				'required' => false,
				'help' => "Seleccione su tipo de documento",
				'placeholder' => 'Seleccionar',
				"attr" => [
					'placeholder' => "Seleccionar",
					'class' => 'form-select'
				]
			]
		);

		$builder->add('documento', 
			TextType::class, [
				'label' => "Nro de Documento",
				'required' => false,
				'help' => "Ingrese su numero de documento",
				"attr" => [
					'placeholder' => "###########",
				]
			]
		);
		
		$builder->add('genero', 
			EntityType::class, [
				'class' => Genero::class,
				'label' => "Genero",
				'required' => false,
				'help' => "Seleccione su genero",
				'placeholder' => 'Seleccionar',
				"attr" => [
					'placeholder' => "Seleccionar",
					'class' => 'form-select'
				]
			]
		);

		$builder->add('nacionalidad', 
			EntityType::class, [
				'class' => Pais::class,
				'label' => "Nacionalidad",
				'required' => false,
				'help' => "Seleccione su nacionalidad",
				'placeholder' => 'Seleccionar',
				"attr" => [
					'placeholder' => "Seleccionar",
					'class' => 'form-select'
				]
			]
		);

		$builder->add('estado_civil', 
			EntityType::class, [
				'class' => EstadoCivil::class,
				'label' => "Estado Civil",
				'required' => false,
				'help' => "Seleccione su estado civil",
				'placeholder' => 'Seleccionar',
				"attr" => [
					'placeholder' => "Seleccionar",
					'class' => 'form-select'
				]
			]
		);

		$builder->add('guardar', SubmitType::class,['label' => 'Guardar']);
	}
}