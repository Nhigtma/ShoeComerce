<?php

namespace App\Controller;

use App\Service\UsuarioService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UsuarioController extends AbstractController
{
    private $entityManager;
    private $usuarioService;

    public function __construct(EntityManagerInterface $entityManager, UsuarioService $usuarioService)
    {
        $this->entityManager = $entityManager;
        $this->usuarioService = $usuarioService;
    }

    /**
     * @Route("/usuarios/nuevo", name="usuarios_nuevo", methods={"POST"})
     */
    public function nuevo(Request $request): Response
    {
        if ($request->isMethod('POST')) {
            // Decodificar el contenido JSON del cuerpo de la solicitud
            $data = json_decode($request->getContent(), true);

            // Validar que los datos hayan sido enviados correctamente
            if (!$data) {
                return new Response('Error al decodificar el JSON.', 400);
            }

            // Obtener los valores del JSON
            $nombre = $data['nombre'] ?? null;
            $email = $data['email'] ?? null;
            $password = $data['password'] ?? null;
            $rol = $data['rol'] ?? null;
            $telefono = $data['telefono'] ?? null;

            // Validar que todos los campos requeridos estén presentes
            if (!$nombre || !$email || !$password || !$rol || !$telefono) {
                return new Response('Faltan datos en la solicitud.', 400);
            }

            // Usar el servicio de usuario para insertar un nuevo usuario
            $this->usuarioService->insertarUsuario($nombre, $email, $rol, $telefono, $password);

            return new Response('Usuario creado con éxito.', 201);
        }

        // Mostrar el formulario cuando sea una solicitud GET (si es necesario)
        return $this->render('usuarios/nuevo.html.twig');
    }

    /**
     * @Route("/usuarios", name="usuarios_lista", methods={"GET"})
     */
    public function lista(): Response
    {
        // Obtener el listado de usuarios desde el servicio
        $usuarios = $this->usuarioService->listarUsuarios();

        // Pasar los usuarios a la plantilla para mostrarlos
        return $this->render('usuarios/lista.html.twig', [
            'usuarios' => $usuarios,
        ]);
    }
}