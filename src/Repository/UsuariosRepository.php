<?php

namespace src\Repository;

use src\Document\Usuario;
use Doctrine\ODM\MongoDB\Repository\DocumentRepository;

class UsuarioRepository extends DocumentRepository
{
    public function findByFirebaseUid(string $firebaseUid): ?Usuario
    {
        return $this->findOneBy(['firebaseUid' => $firebaseUid]);
    }
}
