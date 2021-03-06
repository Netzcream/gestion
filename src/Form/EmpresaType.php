<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\FormBuilderInterface;

use App\Entity\TipoDocumento;
use App\Entity\EmpresaEstado;
use App\Form\CorreoType;

class EmpresaType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options): void
	{
		$entity = $builder->getData();
		$builder->add('razon_social', 
			TextType::class,[
				'label' => "Razón Social",
				'help' => "Por favor, ingrese razón social",
				"attr" => [
					'placeholder' => "Ingresar razón social",
				]
			]

		);
		$builder->add('nombre_fantasia', 
			TextType::class,[
				'label' => "Nombre de fantasía",
				'help' => "Por favor, ingrese nombre de fantasía",
				'required' => false,
				"attr" => [
					'placeholder' => "Nombre de fantasía",
				]
			]
		);
		$builder->add('correo', 
			CorreoType::class,[
				'required' => false,
				'label' => "Correo electrónico",
				'help' => "Correo principal",
				'placeholder' => "Ej: usuario@empresa.com",
				
			]
		);
		$builder->add('correo_alternativo', 
			CorreoType::class,[
				'required' => false,
				'label' => "Correo electrónico",
				'help' => "Correo alternativo",
				'placeholder' => "Ej: usuario@empresa.com",
				
			]
		);

		$builder->add('tipo_documento', 
			EntityType::class, [
				'class' => TipoDocumento::class,
				'label' => "Tipo de Documento",
				'required' => false,
				'help' => "Seleccione tipo de documento",
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
				'help' => "Ingresar documento",
				"attr" => [
					'placeholder' => "###########",
				]
			]
		);

		$builder->add('cliente', 
			CheckboxType::class, [
				'label' => "Cliente",
				'required' => false,
				"attr" => [
				]
			]
		);
		$builder->add('proveedor', 
			CheckboxType::class, [
				'label' => "Proveedor",
				'required' => false,
				"attr" => [
				]
			]
		);
		

		$builder->add('estado', 
			EntityType::class, [
				'class' => EmpresaEstado::class,
				'label' => "Estado",
				'required' => false,
				'help' => "Seleccione estado",
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