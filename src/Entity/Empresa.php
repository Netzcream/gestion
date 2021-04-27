<?php

namespace App\Entity;

use App\Repository\EmpresaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmpresaRepository::class)
 */
class Empresa
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
    private $razon_social;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nombre_fantasia;

    /**
     * @ORM\ManyToOne(targetEntity=TipoDocumento::class, inversedBy="empresas")
     */
    private $tipo_documento;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $documento;

    /**
     * @ORM\ManyToOne(targetEntity=EmpresaEstado::class, inversedBy="empresas")
     */
    private $estado;

    /**
     * @ORM\OneToMany(targetEntity=Direccion::class, mappedBy="empresa")
     */
    private $direcciones;

    /**
     * @ORM\ManyToMany(targetEntity=Contacto::class, inversedBy="empresas")
     */
    private $contactos;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $cliente;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $proveedor;

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
        $this->direcciones = new ArrayCollection();
        $this->contactos = new ArrayCollection();
    
        $this->idCrm = bin2hex(openssl_random_pseudo_bytes(4)).'-'.bin2hex(openssl_random_pseudo_bytes(2)).'-'.bin2hex(openssl_random_pseudo_bytes(2)).'-'.bin2hex(openssl_random_pseudo_bytes(2)).'-'.bin2hex(openssl_random_pseudo_bytes(6));
        
    }

    public function __toString() {
        return $this->razon_social;
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getRazonSocial(): ?string
    {
        return $this->razon_social;
    }

    public function setRazonSocial(string $razon_social): self
    {
        $this->razon_social = $razon_social;

        return $this;
    }

    public function getNombreFantasia(): ?string
    {
        return $this->nombre_fantasia;
    }

    public function setNombreFantasia(?string $nombre_fantasia): self
    {
        $this->nombre_fantasia = $nombre_fantasia;

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

    public function getEstado(): ?EmpresaEstado
    {
        return $this->estado;
    }

    public function setEstado(?EmpresaEstado $estado): self
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
            $direccione->setEmpresa($this);
        }

        return $this;
    }

    public function removeDireccione(Direccion $direccione): self
    {
        if ($this->direcciones->removeElement($direccione)) {
            // set the owning side to null (unless already changed)
            if ($direccione->getEmpresa() === $this) {
                $direccione->setEmpresa(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Contacto[]
     */
    public function getContactos(): Collection
    {
        return $this->contactos;
    }

    public function addContacto(Contacto $contacto): self
    {
        if (!$this->contactos->contains($contacto)) {
            $this->contactos[] = $contacto;
        }

        return $this;
    }

    public function removeContacto(Contacto $contacto): self
    {
        $this->contactos->removeElement($contacto);

        return $this;
    }

    public function getCliente(): ?bool
    {
        return $this->cliente;
    }

    public function setCliente(?bool $cliente): self
    {
        $this->cliente = $cliente;

        return $this;
    }

    public function getProveedor(): ?bool
    {
        return $this->proveedor;
    }

    public function setProveedor(?bool $proveedor): self
    {
        $this->proveedor = $proveedor;

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
