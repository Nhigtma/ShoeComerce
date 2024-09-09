<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
class Factura
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Usuario::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $usuario;

    #[ORM\ManyToMany(targetEntity: $productos::class)]
    #[ORM\JoinTable(name: "facturas_productos")]
    private $productos;

    #[ORM\Column(type: 'string', length: 50)]
    private $tipoDePago;

    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private $total;

    #[ORM\Column(type: 'datetime')]
    private $fecha;

    public function __construct()
    {
        $this->productos = new ArrayCollection();
    }

    // Getters y setters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsuario(): ?Usuario
    {
        return $this->usuario;
    }

    public function setUsuario(?Usuario $usuario): self
    {
        $this->usuario = $usuario;
        return $this;
    }

    /**
     * @return Collection|Producto[]
     */
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

    public function getTotal(): ?string
    {
        return $this->total;
    }

    public function setTotal(string $total): self
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