<?php

namespace src\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use src\Service\FirebaseAuthService;

class FirebaseAuthController1 extends AbstractController
{
    private $authService;

    public function __construct(FirebaseAuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * @Route("/register", name="register", methods={"POST"})
     */
    public function register(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $email = $data['email'];
        $password = $data['password'];
        $displayName = $data['displayName'] ?? null;

        try {
            $usuario = $this->authService->registerUser($email, $password, $displayName);
            return new JsonResponse(['message' => 'User registered successfully', 'user' => $usuario->getId()]);
        } catch (\Exception $e) {
            return new JsonResponse(['error' => $e->getMessage()], 400);
        }
    }

    /**
     * @Route("/login", name="login", methods={"POST"})
     */
    public function login(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $email = $data['email'];
        $password = $data['password'];

        $usuario = $this->authService->loginUser($email, $password);

        if ($usuario) {
            return new JsonResponse(['message' => 'Login successful', 'user' => $usuario->getId()]);
        }

        return new JsonResponse(['error' => 'Invalid credentials'], 401);
    }
}