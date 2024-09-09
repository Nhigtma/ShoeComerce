<?php
// src/Service/UsuarioService.php
namespace App\Service;

use App\Entity\Usuario;
use Doctrine\ODM\MongoDB\DocumentManager;

class UsuarioService
{
    private $documentManager;

    public function __construct(DocumentManager $documentManager)
    {
        $this->documentManager = $documentManager;
    }

    public function obtenerUsuarioPorId(int $id): ?Usuario
    {
        return $this->documentManager->getRepository(Usuario::class)->find($id);
    }
    public function listarUsuarios()
    {
        return $this->documentManager->getRepository(Usuario::class)->findAll();
    }

    public function insertarUsuario(string $nombre, string $email,string $rol, string $telefono, string $password)
    {
        // Crear una nueva instancia de Usuario
        $usuario = new Usuario();
        $usuario->setNombre($nombre);
        $usuario->setEmail($email);
        $usuario->setPassword(password_hash($password, PASSWORD_BCRYPT)); // Encriptar la contraseña
        $usuario->setRol($rol);
        $usuario->setTelefono($telefono);

        // Persiste y guarda el nuevo usuario en la base de datos
        $this->documentManager->persist($usuario);
        $this->documentManager->flush();
    }

}
