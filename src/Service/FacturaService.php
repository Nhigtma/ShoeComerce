<?php

// src/Service/FacturaService.php
namespace App\Service;

use App\Entity\Factura;
use App\Entity\Usuario;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\ProductoService;

class FacturaService
{
    private $entityManager;
    private $productoService;

    public function __construct(EntityManagerInterface $entityManager, ProductoService $productoService)
    {
        $this->entityManager = $entityManager;
        $this->productoService = $productoService;
    }

    public function crearFactura(Usuario $usuario, array $productosIds, string $tipoDePago, float $total): Factura
    {
        $factura = new Factura();
        $factura->setUsuario($usuario);
        $factura->setTipoDePago($tipoDePago);
        $factura->setTotal($total);
        $factura->setFecha(new \DateTime());

        // Agregar productos a la factura
        foreach ($productosIds as $productoId) {
            $producto = $this->productoService->obtenerProductoPorId($productoId);
            if ($producto) {
                $factura->addProducto($producto);
            }
        }

        $this->entityManager->persist($factura);
        $this->entityManager->flush();

        return $factura;
    }

    public function obtenerFacturaPorId(int $id): ?Factura
    {
        return $this->entityManager->getRepository(Factura::class)->find($id);

    }
    public function obtenerTodasLasFacturas(): array
    {
        return $this->entityManager->getRepository(Factura::class)->findAll();
    }
}
