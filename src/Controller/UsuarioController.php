<?php

namespace App\Controller;

use App\Service\UsuarioService;
use App\Entity\Usuario; // Asegúrate de que la entidad Usuario esté en este namespace
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UsuarioController extends AbstractController
{
    private $entityManager;
    private $usuarioService;
    public function __construct(EntityManagerInterface $entityManager,UsuarioService $usuarioService)
    {
        $this->entityManager = $entityManager;
        $this->usuarioService = $usuarioService;
    }

    #[Route('/usuarios/nuevo', name: 'usuarios_nuevo', methods: ['GET', 'POST'])]
    public function nuevo(Request $request): Response
    {
        if ($request->isMethod('POST')) {
            // Obtener los datos enviados desde el formulario
            $nombre = $request->request->get('nombre');
            $email = $request->request->get('email');
            $password = $request->request->get('password'); // La contraseña se puede encriptar antes de guardarla
            $rol = $request->request->get('rol');
            $telefono = $request->request->get('telefono');

            // aqui se usa el usuario service
            $this->usuarioService->insertarUsuario($nombre, $email, $rol, $telefono, $password);
            // Redirigir o mostrar un mensaje de éxito
            return new Response('Usuario creado con éxito.');
        }

        // Mostrar el formulario cuando sea una solicitud GET
        return $this->render('usuarios/nuevo.html.twig');
    }

    #[Route('/usuarios', name: 'usuarios_lista', methods: ['GET'])]
    public function lista(): Response
    {
        // Obtener el repositorio de usuarios y todos los usuarios
        // $usuarios = [];
        $usuarios = $this->usuarioService->listarUsuarios();

        // Pasar los usuarios a la plantilla para mostrarlos
        return $this->render('usuarios/lista.html.twig', [
            'usuarios' => $usuarios,
        ]);
    }
}
