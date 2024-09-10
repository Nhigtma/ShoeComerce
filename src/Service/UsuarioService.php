<?php

namespace App\Service;

use App\Document\Usuario;
use Doctrine\ODM\MongoDB\DocumentManager;

class UsuarioService
{
    private DocumentManager $documentManager;

    public function __construct(DocumentManager $documentManager)
    {
        $this->documentManager = $documentManager;
    }

    public function obtenerUsuarioPorId(string $id): ?Usuario
    {
        return $this->documentManager->getRepository(Usuario::class)->find($id);
    }

    public function listarUsuarios(): array
    {
        return $this->documentManager->getRepository(Usuario::class)->findAll();
    }

    public function insertarUsuario(string $nombre, string $email, string $rol, string $telefono, string $password): Usuario
    {
        $usuario = new Usuario();
        $usuario->setNombre($nombre);
        $usuario->setEmail($email);
        $usuario->setPassword(password_hash($password, PASSWORD_BCRYPT)); // Encriptar la contraseña
        $usuario->setRol($rol);
        $usuario->setTelefono($telefono);

        $this->documentManager->persist($usuario);
        $this->documentManager->flush();

        return $usuario;
    }
}

