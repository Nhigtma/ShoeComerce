<?php
namespace App\Entity;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
/**
 * @ODM\Document(collection="products")
 */
class Ususario {
    /**
     * @ODM\Id
     */
    private $id_u;

    /**
     * @ODM\Field(type="string")
     */
    private $nombre;
    
    /**
     * @ODM\Field(type="string")
     */
    private $contraseña;

    /**
     * @ODM\Field(type="string")
     */
    private $rol;

    /**
     * @ODM\Field(type="string")
     */
    private $correo;

    /**
     * @ODM\Field(type="int")
     */
    private $telefono;

    public function getId(): ?int {
        return $this->id_u;
    }
    public function getNombre(): ?string{
        return $this->nombre;
    }
    public function setNombre(string $nombre): self {
        $this->nombre = $nombre;
        return $this;
    }
    public function getContraseña(): ?string{
        return $this->contraseña;
    }
    public function setContraseña(string $contraseña): self {
        $this->contraseña = $contraseña;
        return $this;
    }
    public function getRol(): ?string{
        return $this->rol;
    }
    public function setRol(string $rol): self {
        if($rol === "Admin" || $rol === "Empleado"){
            $this->rol = $rol;
            return $this;
        }else{
            throw new \Psr\Log\InvalidArgumentException("Rol no permitido");
        }
    }
    public function getCorreo(): ?string{
        return $this->correo;
    }
    public function setCorreo(string $correo): self {
        $this->correo = $correo;
        return $this;
    }
    public function getTelefono(): ?int{
        return $this->telefono;
    }
    public function setTelefono(string $telefono): self {
        $this->telefono = $telefono;
        return $this;
    }
}



