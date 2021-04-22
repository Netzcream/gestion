<?php

namespace App\Entity\Cliente;

use App\Repository\Cliente\ContactoEstadoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContactoEstadoRepository::class)
 */
class ContactoEstado
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
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $vigente;

    /**
     * @ORM\OneToMany(targetEntity=Contacto::class, mappedBy="estado")
     */
    private $contactos;

    public function __construct()
    {
        $this->contactos = new ArrayCollection();
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
            $contacto->setEstado($this);
        }

        return $this;
    }

    public function removeContacto(Contacto $contacto): self
    {
        if ($this->contactos->removeElement($contacto)) {
            // set the owning side to null (unless already changed)
            if ($contacto->getEstado() === $this) {
                $contacto->setEstado(null);
            }
        }

        return $this;
    }
}
