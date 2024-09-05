<?php
namespace App\Service;

use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;
use MongoDB\Client as MongoClient;
/*
class FirebaseAuthService
{
    private $auth;
    private $mongoClient;
    private $mongoCollection;

    public function __construct()
    {
        $factory = (new Factory)
            ->withServiceAccount('%kernel.project_dir%/config/firebase/APIsdk.json');
        
        $this->auth = $factory->createAuth();
        $this->mongoClient = new MongoClient('mongodb://localhost:27017');
        $this->mongoCollection = $this->mongoClient->selectCollection('tu_base_de_datos', 'usuarios');
    }

    public function getAuth(): Auth
    {
        return $this->auth;
    }

    public function createUser($email, $password, $additionalData = [])
    {
        $userProperties = array_merge([
            'email' => $email,
            'password' => $password,
        ], $additionalData);

        $createdUser = $this->auth->createUser($userProperties);

        $userData = array_merge([
            '_id' => $createdUser->uid,
            'email' => $createdUser->email,
        ], $additionalData);

        // Guardar en MongoDB
        $this->mongoCollection->insertOne($userData);

        return $createdUser;
    }

    public function verifyToken($idToken)
    {
        try {
            $verifiedToken = $this->auth->verifyIdToken($idToken);
            $uid = $verifiedToken->claims()->get('sub');

            // Verificar si el usuario existe en MongoDB
            $user = $this->mongoCollection->findOne(['_id' => $uid]);

            if ($user) {
                return $user;
            } else {
                throw new \Exception('Usuario no encontrado en MongoDB');
            }
        } catch (\Throwable $e) {
            // Manejar error de autenticación
            throw new \Exception('Token inválido o no autorizado');
        }
    }
}*/