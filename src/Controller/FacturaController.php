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
        $this->usuarioService= $usuarioService;
    }

    /**
     * @Route("/facturas", name="listar_facturas", methods={"GET"})
     */
    public function listarFacturas(): Response
    {
        $facturas = $this->facturaService->obtenerTodasLasFacturas();

        return $this->render('factura/listar.html.twig', [
            'facturas' => $facturas,
        ]);
    }

    /**
     * @Route("/facturas/nueva", name="nueva_factura", methods={"POST"})
     */
    public function crearFactura(Request $request): Response
    {
        $usuarioId = $request->get('usuario_id');
        $productosIds = $request->get('productos_ids');
        $tipoDePago = $request->get('tipo_de_pago');
        $total = $request->get('total');

        // Obtener el usuario (puedes modificar esto según tu lógica)
        $usuario =$this->usuarioService->obtenerUsuarioPorId($usuarioId);

        if (!$usuario) {
            return new Response('Usuario no encontrado', Response::HTTP_NOT_FOUND);
        }

        // Crear la factura usando el servicio
        $factura = $this->facturaService->crearFactura($usuario, $productosIds, $tipoDePago, $total);

        return new Response('Factura creada con éxito', Response::HTTP_CREATED);
    }
}