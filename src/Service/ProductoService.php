<?php

namespace App\Service;

use App\Entity\Producto;
use Doctrine\ORM\EntityManagerInterface;

class ProductoService
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function obtenerTodosLosProductos(): array
    {
        return $this->entityManager->getRepository(Producto::class)->findAll();
    }

    public function obtenerProductoPorId(int $id): ?Producto
    {
        return $this->entityManager->getRepository(Producto::class)->find($id);
    }

    public function crearProducto(string $nombre, float $precio, string $marca, int $cantidad, string $descripcion): Producto
    {
        $producto = new Producto();
        $producto->setNombre($nombre)
            ->setPrecio($precio)
            ->setMarca($marca)
            ->setCantidad($cantidad)
            ->setDescripcion($descripcion);

        $this->entityManager->persist($producto);
        $this->entityManager->flush();

        return $producto;
    }

    public function eliminarProducto(Producto $producto): void
    {
        $this->entityManager->remove($producto);
        $this->entityManager->flush();
    }
}
