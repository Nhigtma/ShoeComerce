<?php

// src/Service/FacturaService.php
namespace App\Service;

use App\Document\Factura;
use App\Document\Usuario;
use Doctrine\ODM\MongoDB\DocumentManager;
use App\Service\ProductoService;

class FacturaService
{
    private DocumentManager $documentManager;
    private ProductoService $productoService;

    public function __construct(DocumentManager $documentManager, ProductoService $productoService)
    {
        $this->documentManager = $documentManager;
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

        $this->documentManager->persist($factura);
        $this->documentManager->flush();

        return $factura;
    }

    public function obtenerFacturaPorId(string $id): ?Factura
    {
        return $this->documentManager->getRepository(Factura::class)->find($id);
    }

    public function obtenerTodasLasFacturas(): array
    {
        return $this->documentManager->getRepository(Factura::class)->findAll();
    }
}