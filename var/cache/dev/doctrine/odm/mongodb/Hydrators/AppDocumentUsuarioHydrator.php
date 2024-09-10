<?php

namespace Hydrators;

use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Hydrator\HydratorException;
use Doctrine\ODM\MongoDB\Hydrator\HydratorInterface;
use Doctrine\ODM\MongoDB\Query\Query;
use Doctrine\ODM\MongoDB\Mapping\ClassMetadata;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ODM. DO NOT EDIT THIS FILE.
 */
class AppDocumentUsuarioHydrator implements HydratorInterface
{
    private $dm;
    private $class;

    public function __construct(DocumentManager $dm, ClassMetadata $class)
    {
        $this->dm = $dm;
        $this->class = $class;
    }

    public function hydrate(object $document, array $data, array $hints = array()): array
    {
        $hydratedData = array();

        /** @Field(type="id") */
        if (isset($data['_id']) || (! empty($this->class->fieldMappings['id']['nullable']) && array_key_exists('_id', $data))) {
            $value = $data['_id'];
            if ($value !== null) {
                $typeIdentifier = $this->class->fieldMappings['id']['type'];
                $return = $value instanceof \MongoDB\BSON\ObjectId ? (string) $value : $value;
            } else {
                $return = null;
            }
            $this->class->reflFields['id']->setValue($document, $return);
            $hydratedData['id'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['nombre']) || (! empty($this->class->fieldMappings['nombre']['nullable']) && array_key_exists('nombre', $data))) {
            $value = $data['nombre'];
            if ($value !== null) {
                $typeIdentifier = $this->class->fieldMappings['nombre']['type'];
                $return = (string) $value;
            } else {
                $return = null;
            }
            $this->class->reflFields['nombre']->setValue($document, $return);
            $hydratedData['nombre'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['email']) || (! empty($this->class->fieldMappings['email']['nullable']) && array_key_exists('email', $data))) {
            $value = $data['email'];
            if ($value !== null) {
                $typeIdentifier = $this->class->fieldMappings['email']['type'];
                $return = (string) $value;
            } else {
                $return = null;
            }
            $this->class->reflFields['email']->setValue($document, $return);
            $hydratedData['email'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['password']) || (! empty($this->class->fieldMappings['password']['nullable']) && array_key_exists('password', $data))) {
            $value = $data['password'];
            if ($value !== null) {
                $typeIdentifier = $this->class->fieldMappings['password']['type'];
                $return = (string) $value;
            } else {
                $return = null;
            }
            $this->class->reflFields['password']->setValue($document, $return);
            $hydratedData['password'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['rol']) || (! empty($this->class->fieldMappings['rol']['nullable']) && array_key_exists('rol', $data))) {
            $value = $data['rol'];
            if ($value !== null) {
                $typeIdentifier = $this->class->fieldMappings['rol']['type'];
                $return = (string) $value;
            } else {
                $return = null;
            }
            $this->class->reflFields['rol']->setValue($document, $return);
            $hydratedData['rol'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['telefono']) || (! empty($this->class->fieldMappings['telefono']['nullable']) && array_key_exists('telefono', $data))) {
            $value = $data['telefono'];
            if ($value !== null) {
                $typeIdentifier = $this->class->fieldMappings['telefono']['type'];
                $return = (string) $value;
            } else {
                $return = null;
            }
            $this->class->reflFields['telefono']->setValue($document, $return);
            $hydratedData['telefono'] = $return;
        }
        return $hydratedData;
    }
}