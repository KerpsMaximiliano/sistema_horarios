<?php

namespace App\Entity;

use App\Repository\MateriaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MateriaRepository::class)
 */
class Materia
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
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descripcion;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dia;

    /**
     * @ORM\Column(type="integer")
     */
    private $hora_inicio;

    /**
     * @ORM\Column(type="integer")
     */
    private $hora_fin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $aula;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $estado;

    /**
     * @ORM\ManyToMany(targetEntity=Usuario::class, mappedBy="materia")
     */
    private $usuario;

    public function __construct()
    {
        $this->usuario = new ArrayCollection();
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

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getDia(): ?string
    {
        return $this->dia;
    }

    public function setDia(string $dia): self
    {
        $this->dia = $dia;

        return $this;
    }

    public function getHoraInicio(): ?int
    {
        return $this->hora_inicio;
    }

    public function setHoraInicio(int $hora_inicio): self
    {
        $this->hora_inicio = $hora_inicio;

        return $this;
    }

    public function getHoraFin(): ?int
    {
        return $this->hora_fin;
    }

    public function setHoraFin(int $hora_fin): self
    {
        $this->hora_fin = $hora_fin;

        return $this;
    }

    public function getAula(): ?string
    {
        return $this->aula;
    }

    public function setAula(string $aula): self
    {
        $this->aula = $aula;

        return $this;
    }

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(string $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * @return Collection<int, Usuario>
     */
    public function getUsuario(): Collection
    {
        return $this->usuario;
    }

    public function addUsuario(Usuario $usuario): self
    {
        if (!$this->usuario->contains($usuario)) {
            $this->usuario[] = $usuario;
            $usuario->addMaterium($this);
        }

        return $this;
    }

    public function removeUsuario(Usuario $usuario): self
    {
        if ($this->usuario->removeElement($usuario)) {
            $usuario->removeMaterium($this);
        }

        return $this;
    }
}
