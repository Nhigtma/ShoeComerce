<?php

namespace ContainerCfk7VgR;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getUsuarioServiceService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Service\UsuarioService' shared autowired service.
     *
     * @return \App\Service\UsuarioService
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Service'.\DIRECTORY_SEPARATOR.'UsuarioService.php';

        return $container->services['App\\Service\\UsuarioService'] = new \App\Service\UsuarioService(($container->services['doctrine_mongodb.odm.default_document_manager'] ?? $container->load('getDoctrineMongodb_Odm_DefaultDocumentManagerService')));
    }
}
