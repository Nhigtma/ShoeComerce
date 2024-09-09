<?php

namespace ContainerCfk7VgR;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getFacturaControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Controller\FacturaController' shared autowired service.
     *
     * @return \App\Controller\FacturaController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'symfony'.\DIRECTORY_SEPARATOR.'framework-bundle'.\DIRECTORY_SEPARATOR.'Controller'.\DIRECTORY_SEPARATOR.'AbstractController.php';
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Controller'.\DIRECTORY_SEPARATOR.'FacturaController.php';

        $container->services['App\\Controller\\FacturaController'] = $instance = new \App\Controller\FacturaController(($container->services['App\\Service\\FacturaService'] ?? $container->load('getFacturaServiceService')), ($container->services['App\\Service\\UsuarioService'] ?? $container->load('getUsuarioServiceService')));

        $instance->setContainer(($container->privates['.service_locator.QaaoWjx'] ?? $container->load('get_ServiceLocator_QaaoWjxService'))->withContext('App\\Controller\\FacturaController', $container));

        return $instance;
    }
}
