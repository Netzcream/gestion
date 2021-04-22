<?php

namespace App\Entity\Cliente;

use App\Repository\Cliente\PaisRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PaisRepository::class)
 */
class Pais
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $iso;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nombre_corto;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $vigente;

    /**
     * @ORM\OneToMany(targetEntity=Contacto::class, mappedBy="nacionalidad")
     */
    private $contactos;

    /**
     * @ORM\OneToMany(targetEntity=Direccion::class, mappedBy="pais")
     */
    private $direcciones;

    public function __construct()
    {
        $this->contactos = new ArrayCollection();
        $this->direcciones = new ArrayCollection();
        $this->idCrm = bin2hex(openssl_random_pseudo_bytes(4)).'-'.bin2hex(openssl_random_pseudo_bytes(2)).'-'.bin2hex(openssl_random_pseudo_bytes(2)).'-'.bin2hex(openssl_random_pseudo_bytes(2)).'-'.bin2hex(openssl_random_pseudo_bytes(6));
        $this->vigente = 1;
    }

    public function __toString() {
        return $this->nombre;
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

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getIso(): ?string
    {
        return $this->iso;
    }

    public function setIso(?string $iso): self
    {
        $this->iso = $iso;

        return $this;
    }

    public function getNombreCorto(): ?string
    {
        return $this->nombre_corto;
    }

    public function setNombreCorto(?string $nombre_corto): self
    {
        $this->nombre_corto = $nombre_corto;

        return $this;
    }

    public function getVigente(): ?bool
    {
        return $this->vigente;
    }

    public function setVigente(?bool $vigente): self
    {
        $this->vigente = $vigente;

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
            $contacto->setNacionalidad($this);
        }

        return $this;
    }

    public function removeContacto(Contacto $contacto): self
    {
        if ($this->contactos->removeElement($contacto)) {
            // set the owning side to null (unless already changed)
            if ($contacto->getNacionalidad() === $this) {
                $contacto->setNacionalidad(null);
            }
        }

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
            $direccione->setPais($this);
        }

        return $this;
    }

    public function removeDireccione(Direccion $direccione): self
    {
        if ($this->direcciones->removeElement($direccione)) {
            // set the owning side to null (unless already changed)
            if ($direccione->getPais() === $this) {
                $direccione->setPais(null);
            }
        }

        return $this;
    }
}
