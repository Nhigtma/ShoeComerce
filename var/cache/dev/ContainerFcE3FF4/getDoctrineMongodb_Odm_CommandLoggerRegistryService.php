<?php

namespace ContainerFcE3FF4;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getDoctrineMongodb_Odm_CommandLoggerRegistryService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'doctrine_mongodb.odm.command_logger_registry' shared service.
     *
     * @return \Doctrine\Bundle\MongoDBBundle\APM\CommandLoggerRegistry
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'doctrine'.\DIRECTORY_SEPARATOR.'mongodb-odm-bundle'.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'APM'.\DIRECTORY_SEPARATOR.'CommandLoggerRegistry.php';

        return $container->services['doctrine_mongodb.odm.command_logger_registry'] = new \Doctrine\Bundle\MongoDBBundle\APM\CommandLoggerRegistry(new RewindableGenerator(function () use ($container) {
            yield 0 => ($container->privates['doctrine_mongodb.odm.stopwatch_command_logger'] ?? $container->load('getDoctrineMongodb_Odm_StopwatchCommandLoggerService'));
            yield 1 => ($container->privates['doctrine_mongodb.odm.psr_command_logger'] ?? $container->load('getDoctrineMongodb_Odm_PsrCommandLoggerService'));
            yield 2 => ($container->privates['doctrine_mongodb.odm.data_collector.command_logger'] ??= new \Doctrine\ODM\MongoDB\APM\CommandLogger());
        }, 3));
    }
}
