<?php

namespace App\Entity\General;

use App\Repository\General\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;


/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string" , nullable=true)
     */
    private $password;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isActive;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isVerified = false;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $googleId;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $enabled;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $locale;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $apellido;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $googleAvatar;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechaCrea;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $ultimoIngreso;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $avatar;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $facebookId;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $facebookAvatar;


    public function __construct() {
        $this->fechaCrea = new \DateTime();
    }

    public function getAvatar() : ?string {


        if ($this->avatar) {
            return (string) $this->avatar;
        }

        else if ($this->getGoogleAvatar()) {
            $this->avatar = $this->getGoogleAvatar();
            return (string) $this->getGoogleAvatar();
        }
        else if ($this->getFacebookAvatar()) {
            $this->avatar = $this->getFacebookAvatar();
            return (string) $this->getFacebookAvatar();
        }

        else {
            $hash = md5(strtolower(trim($this->getEmail())));
            $this->avatar = sprintf('https://www.gravatar.com/avatar/%s', $hash);
            return (string) $this->avatar;
        }
        
    }

    public function getMainEmailAddress() : ?string {

        return (string) $this->email;
    }

    

    public function getFullName() : ?string {

        return (string) $this->email;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function addRoles(string $rol): self
    {
        $this->roles[] = $rol;

        return $this;
    }


    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(?bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    public function getGoogleId(): ?string
    {
        return $this->googleId;
    }

    public function setGoogleId(?string $googleId): self
    {
        $this->googleId = $googleId;

        return $this;
    }

    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

    public function setEnabled(?bool $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }

    public function getLocale(): ?string
    {
        return $this->locale;
    }

    public function setLocale(?string $locale): self
    {
        $this->locale = $locale;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    public function setApellido(?string $apellido): self
    {
        $this->apellido = $apellido;

        return $this;
    }

    public function getGoogleAvatar(): ?string
    {
        return $this->googleAvatar;
    }

    public function setGoogleAvatar(?string $googleAvatar): self
    {
        $this->googleAvatar = $googleAvatar;

        return $this;
    }

    public function getFechaCrea(): ?\DateTimeInterface
    {
        return $this->fechaCrea;
    }

    public function setFechaCrea(\DateTimeInterface $fechaCrea): self
    {
        $this->fechaCrea = $fechaCrea;

        return $this;
    }

    public function getUltimoIngreso(): ?\DateTimeInterface
    {
        return $this->ultimoIngreso;
    }

    public function setUltimoIngreso(?\DateTimeInterface $ultimoIngreso): self
    {
        $this->ultimoIngreso = $ultimoIngreso;

        return $this;
    }

    public function setAvatar(?string $avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }

    public function getFacebookId(): ?string
    {
        return $this->facebookId;
    }

    public function setFacebookId(?string $facebookId): self
    {
        $this->facebookId = $facebookId;

        return $this;
    }

    public function getFacebookAvatar(): ?string
    {
        return $this->facebookAvatar;
    }

    public function setFacebookAvatar(string $facebookAvatar): self
    {
        $this->facebookAvatar = $facebookAvatar;

        return $this;
    }

}