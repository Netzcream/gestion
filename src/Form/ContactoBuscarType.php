<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\FormBuilderInterface;

use App\Entity\Cliente\TipoDocumento;
use App\Entity\Cliente\Genero;
use App\Entity\Cliente\Pais;
use App\Entity\Cliente\EstadoCivil;

class ContactoBuscarType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options): void
	{
		$entity = $builder->getData();
		$builder->add('texto', 
			TextType::class,[
				'label' => "Buscar",
				'help' => "Por favor, ingrese nombre o parte de el para realizar la búsqueda",
				"attr" => [
					'placeholder' => "Buscar...",
				]
			]

		);
		/*$builder->add('apellido', 
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
				'required' => true,
				'help' => "Seleccione su tipo de documento",
				'empty_data' => 'Seleccionar',
				"attr" => [
					'placeholder' => "Seleccionar",
				]
			]
		);

		$builder->add('documento', 
			TextType::class, [
				'label' => "Nro de Documento",
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
				'required' => true,
				'help' => "Seleccione su genero",
				'empty_data' => 'Seleccionar',
				"attr" => [
					'placeholder' => "Seleccionar",
				]
			]
		);

		$builder->add('nacionalidad', 
			EntityType::class, [
				'class' => Pais::class,
				'label' => "Nacionalidad",
				'required' => true,
				'help' => "Seleccione su nacionalidad",
				'empty_data' => 'Seleccionar',
				"attr" => [
					'placeholder' => "Seleccionar",
				]
			]
		);

		$builder->add('estado_civil', 
			EntityType::class, [
				'class' => EstadoCivil::class,
				'label' => "Estado Civil",
				'required' => true,
				'help' => "Seleccione su estado civil",
				'empty_data' => 'Seleccionar',
				"attr" => [
					'placeholder' => "Seleccionar",
				]
			]
		);*/

		$builder->add('Buscar', SubmitType::class);
	}
}