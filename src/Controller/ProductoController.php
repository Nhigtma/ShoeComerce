<?php

namespace App\Controller;

use App\Service\ProductoService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductoController extends AbstractController
{
    private $productoService;

    public function __construct(ProductoService $productoService)
    {
        $this->productoService = $productoService;
    }

    /**
     * @Route("/productos", name="listar_productos", methods={"GET"})
     */
    public function listarProductos(): JsonResponse
    {
        $productos = $this->productoService->obtenerTodosLosProductos();

        return new JsonResponse($productos, Response::HTTP_OK);
    }

    /**
     * @Route("/productos/nuevo", name="nuevo_producto", methods={"POST"})
     */
    public function crearProducto(Request $request): JsonResponse
    {
        // Decodificar el contenido JSON
        $data = json_decode($request->getContent(), true);

        // Validar si el JSON tiene los campos requeridos
        if (!isset($data['nombre'], $data['precio'], $data['marca'], $data['cantidad'], $data['descripcion'])) {
            return new JsonResponse(['error' => 'Faltan campos requeridos'], Response::HTTP_BAD_REQUEST);
        }

        // Crear el nuevo producto usando el servicio
        $producto = $this->productoService->crearProducto(
            $data['nombre'],
            (float) $data['precio'],
            $data['marca'],
            (int) $data['cantidad'],
            $data['descripcion']
        );

        return new JsonResponse(['message' => 'Producto creado con éxito', 'producto' => $producto], Response::HTTP_CREATED);
    }

    /**
     * @Route("/productos/{id}", name="detalle_producto", methods={"GET"})
     */
    public function detalleProducto(string $id): JsonResponse
    {
        $producto = $this->productoService->obtenerProductoPorId($id);

        if (!$producto) {
            return new JsonResponse(['error' => 'Producto no encontrado'], Response::HTTP_NOT_FOUND);
        }

        return new JsonResponse($producto, Response::HTTP_OK);
    }

    /**
     * @Route("/productos/{id}/eliminar", name="eliminar_producto", methods={"DELETE"})
     */
    public function eliminarProducto(string $id): JsonResponse
    {
        $producto = $this->productoService->obtenerProductoPorId($id);

        if (!$producto) {
            return new JsonResponse(['error' => 'Producto no encontrado'], Response::HTTP_NOT_FOUND);
        }

        $this->productoService->eliminarProducto($producto);

        return new JsonResponse(['message' => 'Producto eliminado con éxito'], Response::HTTP_OK);
    }
}