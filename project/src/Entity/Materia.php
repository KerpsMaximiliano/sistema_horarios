<?php
    namespace App\Entity;

    use Doctrine\Common\Collections\ArrayCollection;
    use Doctrine\Common\Collections\Collection;
    use Doctrine\ORM\Mapping as ORM;

    use App\Repository\MateriaRepository;

    /**
    * @ORM\Entity(repositoryClass=MateriaRepository::class)
    */
    class Materia {
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
        * @ORM\Column(type="integer")
        */
        private $horaInicio;

        /**
        * @ORM\Column(type="integer")
        */
        private $horaFin;

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
        private $usuarios;

        /**
        * @ORM\Column(type="string", length=255)
        */
        private $dia;

        public function __construct() {
            $this->usuarios = new ArrayCollection();
        }

        public function getId(): ?int {
            return $this->id;
        }

        public function getNombre(): ?string {
            return $this->nombre;
        }

        public function setNombre(string $nombre): self {
            $this->nombre = $nombre;

            return $this;
        }

        public function getDescripcion(): ?string {
            return $this->descripcion;
        }

        public function setDescripcion(string $descripcion): self {
            $this->descripcion = $descripcion;

            return $this;
        }

        public function getHoraInicio(): ?int {
            return $this->horaInicio;
        }

        public function setHoraInicio(int $horaInicio): self {
            $this->horaInicio = $horaInicio;

            return $this;
        }

        public function getHoraFin(): ?int {
            return $this->horaFin;
        }

        public function setHoraFin(int $horaFin): self {
            $this->horaFin = $horaFin;

            return $this;
        }

        public function getAula(): ?string {
            return $this->aula;
        }

        public function setAula(string $aula): self {
            $this->aula = $aula;

            return $this;
        }

        public function getEstado(): ?string {
            return $this->estado;
        }

        public function setEstado(string $estado): self {
            $this->estado = $estado;

            return $this;
        }

        /**
        * @return Collection<int, Usuario>
        */
        public function getUsuarios(): Collection {
            return $this->usuarios;
        }

        public function addUsuario(Usuario $usuario): self {
            if (!$this->usuarios->contains($usuario)) {
                $this->usuarios[] = $usuario;
                $usuario->addMaterium($this);
            }

            return $this;
        }

        public function removeUsuario(Usuario $usuario): self {
            if ($this->usuarios->removeElement($usuario)) {
                $usuario->removeMaterium($this);
            }

            return $this;
        }

        public function getDia(): ?string {
            return $this->dia;
        }

        public function setDia(string $dia): self {
            $this->dia = $dia;

            return $this;
        }
    }
?>