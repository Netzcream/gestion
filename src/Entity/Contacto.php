<?php

namespace App\Entity;

use App\Repository\ContactoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContactoRepository::class)
 */
class Contacto
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $idCrm;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $apellido;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fecha_nacimiento;

    /**
     * @ORM\ManyToOne(targetEntity=TipoDocumento::class)
     */
    private $tipo_documento;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $documento;

    /**
     * @ORM\ManyToOne(targetEntity=Genero::class, inversedBy="contactos")
     */
    private $genero;

    /**
     * @ORM\ManyToOne(targetEntity=Pais::class, inversedBy="contactos")
     */
    private $nacionalidad;

    /**
     * @ORM\ManyToOne(targetEntity=EstadoCivil::class, inversedBy="contactos")
     */
    private $estado_civil;

    /**
     * @ORM\ManyToOne(targetEntity=ContactoEstado::class, inversedBy="contactos")
     */
    private $estado;

    /**
     * @ORM\OneToMany(targetEntity=Direccion::class, mappedBy="contacto")
     */
    private $direcciones;

    /**
     * @ORM\ManyToMany(targetEntity=Empresa::class, mappedBy="contactos")
     */
    private $empresas;

    /**
     * @ORM\ManyToOne(targetEntity=Empresa::class)
     */
    private $empresa;

    /**
     * @ORM\ManyToOne(targetEntity=Correo::class)
     */
    private $correo;

    /**
     * @ORM\ManyToOne(targetEntity=Correo::class)
     */
    private $correo_alternativo;

    public function __construct()
    {
        $this->idCrm = bin2hex(openssl_random_pseudo_bytes(4)).'-'.bin2hex(openssl_random_pseudo_bytes(2)).'-'.bin2hex(openssl_random_pseudo_bytes(2)).'-'.bin2hex(openssl_random_pseudo_bytes(2)).'-'.bin2hex(openssl_random_pseudo_bytes(6));
        $this->direcciones = new ArrayCollection();
        $this->empresas = new ArrayCollection();
    }
    public function __toString() {
        return ($this->nombre.' '.$this->apellido);
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    public function setApellido(string $apellido): self
    {
        $this->apellido = $apellido;

        return $this;
    }

    public function getFechaNacimiento(): ?\DateTimeInterface
    {
        return $this->fecha_nacimiento;
    }

    public function setFechaNacimiento(?\DateTimeInterface $fecha_nacimiento): self
    {
        $this->fecha_nacimiento = $fecha_nacimiento;

        return $this;
    }

    public function getTipoDocumento(): ?TipoDocumento
    {
        return $this->tipo_documento;
    }

    public function setTipoDocumento(?TipoDocumento $tipo_documento): self
    {
        $this->tipo_documento = $tipo_documento;

        return $this;
    }

    public function getDocumento(): ?string
    {
        return $this->documento;
    }

    public function setDocumento(?string $documento): self
    {
        $this->documento = $documento;

        return $this;
    }

    public function getGenero(): ?Genero
    {
        return $this->genero;
    }

    public function setGenero(?Genero $genero): self
    {
        $this->genero = $genero;

        return $this;
    }

    public function getIdCrm(): ?string
    {
        return $this->idCrm;
    }

    public function setIdCrm(string $idCrm): self
    {
        $this->idCrm = $idCrm;

        return $this;
    }

    public function getNacionalidad(): ?Pais
    {
        return $this->nacionalidad;
    }

    public function setNacionalidad(?Pais $nacionalidad): self
    {
        $this->nacionalidad = $nacionalidad;

        return $this;
    }

    public function getEstadoCivil(): ?EstadoCivil
    {
        return $this->estado_civil;
    }

    public function setEstadoCivil(?EstadoCivil $estado_civil): self
    {
        $this->estado_civil = $estado_civil;

        return $this;
    }

    public function getEstado(): ?ContactoEstado
    {
        return $this->estado;
    }

    public function setEstado(?ContactoEstado $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * @return Collection|Direccion[]
     */
    public function getDirecciones(): Collection
    {
        return $this->direcciones;
    }

    public function addDireccione(Direccion $direccione): self
    {
        if (!$this->direcciones->contains($direccione)) {
            $this->direcciones[] = $direccione;
            $direccione->setContacto($this);
        }

        return $this;
    }

    public function removeDireccione(Direccion $direccione): self
    {
        if ($this->direcciones->removeElement($direccione)) {
            // set the owning side to null (unless already changed)
            if ($direccione->getContacto() === $this) {
                $direccione->setContacto(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Empresa[]
     */
    public function getEmpresas(): Collection
    {
        return $this->empresas;
    }

    public function addEmpresa(Empresa $empresa): self
    {
        if (!$this->empresas->contains($empresa)) {
            $this->empresas[] = $empresa;
            $empresa->addContacto($this);
        }

        return $this;
    }

    public function removeEmpresa(Empresa $empresa): self
    {
        if ($this->empresas->removeElement($empresa)) {
            $empresa->removeContacto($this);
        }

        return $this;
    }

    public function getEmpresa(): ?Empresa
    {
        return $this->empresa;
    }

    public function setEmpresa(?Empresa $empresa): self
    {
        $this->empresa = $empresa;

        return $this;
    }

    public function getCorreo(): ?Correo
    {
        return $this->correo;
    }

    public function setCorreo(?Correo $correo): self
    {
        $this->correo = $correo;

        return $this;
    }

    public function getCorreoAlternativo(): ?Correo
    {
        return $this->correo_alternativo;
    }

    public function setCorreoAlternativo(?Correo $correo_alternativo): self
    {
        $this->correo_alternativo = $correo_alternativo;

        return $this;
    }
}
