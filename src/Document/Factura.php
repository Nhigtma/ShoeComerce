<?php
declare(strict_types=1);

namespace App\Document;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use App\Document\Usuario;
use App\Document\Producto;

#[ODM\Document(collection: 'facturas')]
class Factura
{
    #[ODM\Id]
    public ?string $id = null;

    #[ODM\ReferenceOne(targetDocument: Usuario::class)]
    public Usuario $usuario;

    #[ODM\ReferenceMany(targetDocument: Producto::class)]
    public Collection $productos;

    #[ODM\Field(type: 'string')]
    public string $tipoDePago;

    #[ODM\Field(type: 'float')]
    public float $total;

    #[ODM\Field(type: 'date')]
    public \DateTime $fecha;

    public function __construct()
    {
        $this->productos = new ArrayCollection();
        $this->fecha = new \DateTime();
    }

    // Getters y setters

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getUsuario(): Usuario
    {
        return $this->usuario;
    }

    public function setUsuario(Usuario $usuario): self
    {
        $this->usuario = $usuario;
        return $this;
    }

    public function getProductos(): Collection
    {
        return $this->productos;
    }

    public function addProducto(Producto $producto): self
    {
        if (!$this->productos->contains($producto)) {
            $this->productos[] = $producto;
        }
        return $this;
    }

    public function removeProducto(Producto $producto): self
    {
        $this->productos->removeElement($producto);
        return $this;
    }

    public function getTipoDePago(): ?string
    {
        return $this->tipoDePago;
    }

    public function setTipoDePago(string $tipoDePago): self
    {
        $this->tipoDePago = $tipoDePago;
        return $this;
    }

    public function getTotal(): ?float
    {
        return $this->total;
    }

    public function setTotal(float $total): self
    {
        $this->total = $total;
        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;
        return $this;
    }
}
