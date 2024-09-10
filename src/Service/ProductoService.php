<?php

namespace App\Service;

use App\Document\Producto;
use Doctrine\ODM\MongoDB\DocumentManager;

class ProductoService
{
    private DocumentManager $documentManager;

    public function __construct(DocumentManager $documentManager)
    {
        $this->documentManager = $documentManager;
    }

    public function obtenerTodosLosProductos(): array
    {
        return $this->documentManager->getRepository(Producto::class)->findAll();
    }

    public function obtenerProductoPorId(string $id): ?Producto
    {
        return $this->documentManager->getRepository(Producto::class)->find($id);
    }

    public function crearProducto(string $nombre, float $precio, string $marca, int $cantidad, string $descripcion): Producto
    {
        $producto = new Producto();
        $producto->setNombre($nombre)
            ->setPrecio($precio)
            ->setMarca($marca)
            ->setCantidad($cantidad)
            ->setDescripcion($descripcion);

        $this->documentManager->persist($producto);
        $this->documentManager->flush();

        return $producto;
    }

    public function eliminarProducto(Producto $producto): void
    {
        $this->documentManager->remove($producto);
        $this->documentManager->flush();
    }
}