<?php

namespace App\Controller;

use App\Service\FacturaService;
use App\Service\UsuarioService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FacturaController extends AbstractController
{
    private $facturaService;
    private $usuarioService;
    
    public function __construct(FacturaService $facturaService, UsuarioService $usuarioService)
    {
        $this->facturaService = $facturaService;
        $this->usuarioService = $usuarioService;
    }

    /**
     * @Route("/facturas", name="factura_listar", methods={"GET"})
     */
    public function listarFacturas(): Response
    {
        $facturas = $this->facturaService->obtenerTodasLasFacturas();

        return $this->json([
            'facturas' => $facturas,
        ]);
    }

    /**
     * @Route("/facturas/nueva", name="nueva_factura", methods={"POST"})
     */
    public function crearFactura(Request $request): Response
    {
        // Obtener el contenido JSON de la solicitud
        $data = json_decode($request->getContent(), true);

        if (!$data) {
            return new Response('Datos inválidos', Response::HTTP_BAD_REQUEST);
        }

        $usuarioId = $data['usuario_id'] ?? null;
        $productosIds = $data['productos_ids'] ?? [];
        $tipoDePago = $data['tipo_de_pago'] ?? '';
        $total = $data['total'] ?? 0;

        // Obtener el usuario
        $usuario = $this->usuarioService->obtenerUsuarioPorId($usuarioId);

        if (!$usuario) {
            return new Response('Usuario no encontrado', Response::HTTP_NOT_FOUND);
        }

        // Crear la factura usando el servicio
        $factura = $this->facturaService->crearFactura($usuario, $productosIds, $tipoDePago, $total);

        return $this->json([
            'message' => 'Factura creada con éxito',
            'factura' => $factura
        ], Response::HTTP_CREATED);
    }
}