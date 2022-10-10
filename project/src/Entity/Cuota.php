<?php
    namespace App\Entity;

    use Doctrine\ORM\Mapping as ORM;

    use App\Repository\CuotaRepository;

    /**
    * @ORM\Entity(repositoryClass=CuotaRepository::class)
    */
    class Cuota {
        /**
        * @ORM\Id
        * @ORM\GeneratedValue
        * @ORM\Column(type="integer")
        */
        private $id;

        /**
        * @ORM\Column(type="string", length=255)
        */
        private $mes;

        /**
        * @ORM\Column(type="boolean")
        */
        private $pago;

        /**
        * @ORM\ManyToOne(targetEntity=Usuario::class, inversedBy="cuotas")
        */
        private $usuario;

        public function getId(): ?int {
            return $this->id;
        }

        public function getMes(): ?string {
            return $this->mes;
        }

        public function setMes(string $mes): self {
            $this->mes = $mes;

            return $this;
        }

        public function isPago(): ?bool {
            return $this->pago;
        }

        public function setPago(bool $pago): self {
            $this->pago = $pago;

            return $this;
        }

        public function getUsuario(): ?Usuario {
            return $this->usuario;
        }

        public function setUsuario(?Usuario $usuario): self {
            $this->usuario = $usuario;

            return $this;
        }
    }
?>