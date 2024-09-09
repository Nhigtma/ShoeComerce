<?php

namespace App\Controller;

use App\Entity\Producto;
use App\Service\ProductoService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
    public function listarProductos(): Response
    {
        $productos = $this->productoService->obtenerTodosLosProductos();

        return $this->render('producto/listar.html.twig', [
            'productos' => $productos,
        ]);
    }

    /**
     * @Route("/productos/nuevo", name="nuevo_producto", methods={"GET", "POST"})
     */
    public function crearProducto(Request $request): Response
    {
        if ($request->isMethod('POST')) {
            $nombre = $request->get('nombre');
            $precio = $request->get('precio');
            $marca = $request->get('marca');
            $cantidad = $request->get('cantidad');
            $descripcion = $request->get('descripcion');

            // Crear el nuevo producto usando el servicio
            $producto = $this->productoService->crearProducto($nombre, $precio, $marca, $cantidad, $descripcion);

            return $this->redirectToRoute('listar_productos');
        }

        return $this->render('producto/nuevo.html.twig');
    }

    /**
     * @Route("/productos/{id}", name="detalle_producto", methods={"GET"})
     */
    public function detalleProducto(int $id): Response
    {
        $producto = $this->productoService->obtenerProductoPorId($id);

        if (!$producto) {
            throw $this->createNotFoundException('El producto no existe');
        }

        return $this->render('producto/detalle.html.twig', [
            'producto' => $producto,
        ]);
    }

    /**
     * @Route("/productos/{id}/eliminar", name="eliminar_producto", methods={"POST"})
     */
    public function eliminarProducto(int $id): Response
    {
        $producto = $this->productoService->obtenerProductoPorId($id);

        if (!$producto) {
            throw $this->createNotFoundException('El producto no existe');
        }

        $this->productoService->eliminarProducto($producto);

        return $this->redirectToRoute('listar_productos');
    }
}