<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\FormBuilderInterface;

use App\Entity\TipoDocumento;
use App\Entity\Genero;
use App\Entity\Pais;
use App\Entity\EstadoCivil;

class EmpresaBuscarType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options): void
	{
		$entity = $builder->getData();
		$builder->add('texto', 
			TextType::class,[
				'label' => "Buscar",
				'help' => "Por favor, ingrese razon social, nombre fantasía o parte de ello para realizar la búsqueda",
				"attr" => [
					'placeholder' => "Buscar...",
				]
			]

		);
		/*

		$builder->add('documento', 
			TextType::class, [
				'label' => "Nro de Documento",
				'help' => "Ingrese su numero de documento",
				"attr" => [
					'placeholder' => "###########",
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

		$builder->add('buscar', SubmitType::class,['label' => 'Buscar']);
	}
}