<?php

namespace App\Entity;

use App\Repository\UsuarioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UsuarioRepository::class)
 */
class Usuario implements UserInterface, PasswordAuthenticatedUserInterface
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
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="integer")
     */
    private $documento;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $apellido;

    /**
     * @ORM\ManyToMany(targetEntity=Materia::class, inversedBy="usuarios")
     */
    private $materia;

    /**
     * @ORM\OneToMany(targetEntity=Cuota::class, mappedBy="usuario")
     */
    private $cuotas;

    /**
     * @ORM\ManyToMany(targetEntity=Notificacion::class, inversedBy="usuarios")
     */
    private $notificaciones;

    public function __construct()
    {
        $this->materia = new ArrayCollection();
        $this->cuotas = new ArrayCollection();
        $this->notificaciones = new ArrayCollection();
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
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
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

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getDocumento(): ?int
    {
        return $this->documento;
    }

    public function setDocumento(int $documento): self
    {
        $this->documento = $documento;

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

    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    public function setApellido(string $apellido): self
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * @return Collection<int, Materia>
     */
    public function getMateria(): Collection
    {
        return $this->materia;
    }

    public function addMaterium(Materia $materium): self
    {
        if (!$this->materia->contains($materium)) {
            $this->materia[] = $materium;
        }

        return $this;
    }

    public function removeMaterium(Materia $materium): self
    {
        $this->materia->removeElement($materium);

        return $this;
    }

    /**
     * @return Collection<int, Cuota>
     */
    public function getCuotas(): Collection
    {
        return $this->cuotas;
    }

    public function addCuota(Cuota $cuota): self
    {
        if (!$this->cuotas->contains($cuota)) {
            $this->cuotas[] = $cuota;
            $cuota->setUsuario($this);
        }

        return $this;
    }

    public function removeCuota(Cuota $cuota): self
    {
        if ($this->cuotas->removeElement($cuota)) {
            // set the owning side to null (unless already changed)
            if ($cuota->getUsuario() === $this) {
                $cuota->setUsuario(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Notificacion>
     */
    public function getNotificaciones(): Collection
    {
        return $this->notificaciones;
    }

    public function addNotificacione(Notificacion $notificacione): self
    {
        if (!$this->notificaciones->contains($notificacione)) {
            $this->notificaciones[] = $notificacione;
        }

        return $this;
    }

    public function removeNotificacione(Notificacion $notificacione): self
    {
        $this->notificaciones->removeElement($notificacione);

        return $this;
    }
}
