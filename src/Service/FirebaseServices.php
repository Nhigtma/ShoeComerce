<?php

namespace src\Service;

use Kreait\Firebase\Auth;
use src\Document\Usuario;
use Doctrine\ODM\MongoDB\DocumentManager;
use src\Repository\UsuarioRepository;

class FirebaseAuthService
{
    private $auth;
    private $documentManager;
    private $usuarioRepository;

    public function __construct(Auth $auth, DocumentManager $documentManager, UsuarioRepository $usuarioRepository)
    {
        $this->auth = $auth;
        $this->documentManager = $documentManager;
        $this->usuarioRepository = $usuarioRepository;
    }

    public function registerUser(string $email, string $password, string $displayName = null): Usuario
    {
        $firebaseUser = $this->auth->createUser([
            'email' => $email,
            'password' => $password,
            'displayName' => $displayName,
        ]);

        $usuario = new Usuario();
        $usuario->setFirebaseUid($firebaseUser->uid);
        $usuario->setEmail($firebaseUser->email);
        $usuario->setDisplayName($firebaseUser->displayName);

        $this->documentManager->persist($usuario);
        $this->documentManager->flush();

        return $usuario;
    }

    public function loginUser(string $email, string $password): ?Usuario
    {
        try {
            $signInResult = $this->auth->signInWithEmailAndPassword($email, $password);
            $firebaseUid = $signInResult->firebaseUserId();
            return $this->usuarioRepository->findByFirebaseUid($firebaseUid);
        } catch (\Exception $e) {
            return null;
        }
    }
}
