<?php

namespace App\Entity;

use App\Repository\CuotaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CuotaRepository::class)
 */
class Cuota
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
    private $mes;

    /**
     * @ORM\Column(type="boolean")
     */
    private $pago;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMes(): ?string
    {
        return $this->mes;
    }

    public function setMes(string $mes): self
    {
        $this->mes = $mes;

        return $this;
    }

    public function isPago(): ?bool
    {
        return $this->pago;
    }

    public function setPago(bool $pago): self
    {
        $this->pago = $pago;

        return $this;
    }
}
