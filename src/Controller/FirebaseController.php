<?php

namespace App\Controller;

use App\Service\FirebaseAuthService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AuthController extends AbstractController
{
    private $firebaseAuthService;

    public function __construct(FirebaseAuthService $firebaseAuthService)
    {
        $this->firebaseAuthService = $firebaseAuthService;
    }

    /**
     * @Route("/auth/inicio", name="auth_inicio", methods={"GET"})
     */
    public function saludo(): Response
    {
        return new Response('Bienvenidos a Sharkstar');
    }

    /**
     * @Route("/auth/signup", name="auth_signup", methods={"POST"})
     */
    public function signUp(Request $request): Response
    {
        $email = $request->get('email');
        $password = $request->get('password');
        $displayName = $request->get('displayName');

        return $this->firebaseAuthService->createUserAccount($email, $password, $displayName);
    }

    /**
     * @Route("/auth/login", name="auth_login", methods={"POST"})
     */
    public function login(Request $request): Response
    {
        $email = $request->get('email');
        $password = $request->get('password');

        return $this->firebaseAuthService->signInWithEmailAndPassword($email, $password);
    }

    /**
     * @Route("/auth/verify", name="auth_verify", methods={"POST"})
     */
    public function verifyToken(Request $request): Response
    {
        $token = $request->get('token');
        return $this->firebaseAuthService->verifyToken($token);
    }

    /**
     * @Route("/auth/signinWithToken", name="auth_signinWithToken", methods={"POST"})
     */
    public function signInWithToken(Request $request): Response
    {
        $token = $request->get('token');
        $userRecord = $this->firebaseAuthService->signIn($token);
        return $userRecord ? new Response(json_encode($userRecord), 200) : new Response('Invalid token', 401);
    }
}



