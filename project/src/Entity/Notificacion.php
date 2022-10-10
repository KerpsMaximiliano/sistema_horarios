<?php
    namespace App\Entity;

    use Doctrine\Common\Collections\ArrayCollection;
    use Doctrine\Common\Collections\Collection;
    use Doctrine\ORM\Mapping as ORM;

    use App\Repository\NotificacionRepository;

    /**
    * @ORM\Entity(repositoryClass=NotificacionRepository::class)
    */
    class Notificacion {
        /**
        * @ORM\Id
        * @ORM\GeneratedValue
        * @ORM\Column(type="integer")
        */
        private $id;

        /**
        * @ORM\Column(type="string", length=255)
        */
        private $titulo;

        /**
        * @ORM\Column(type="string", length=255)
        */
        private $descripcion;

        /**
        * @ORM\ManyToMany(targetEntity=Usuario::class, mappedBy="notificaciones")
        */
        private $usuarios;

        public function __construct() {
            $this->usuarios = new ArrayCollection();
        }

        public function getId(): ?int {
            return $this->id;
        }

        public function getTitulo(): ?string {
            return $this->titulo;
        }

        public function setTitulo(string $titulo): self {
            $this->titulo = $titulo;

            return $this;
        }

        public function getDescripcion(): ?string {
            return $this->descripcion;
        }

        public function setDescripcion(string $descripcion): self {
            $this->descripcion = $descripcion;

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
                $usuario->addNotificacione($this);
            }

            return $this;
        }

        public function removeUsuario(Usuario $usuario): self {
            if ($this->usuarios->removeElement($usuario)) {
                $usuario->removeNotificacione($this);
            }

            return $this;
        }
    }
?>