<?php

namespace MeetupBundle\Infrastructure\Bus\Command\Middleware;

use MeetupBundle\Domain\Bus\Command\CommandInterface;
use MeetupBundle\Infrastructure\Service\Container\ContainerInterface;
use MeetupBundle\Infrastructure\Service\Container\InvalidServiceException;
use MeetupBundle\Infrastructure\Service\Inflector\InflectorInterface;

/**
 * Class CommandHandler
 * @package MeetupBundle\Infrastructure\Bus\Command\Middleware
 */
class CommandHandler implements MiddlewareInterface
{
    /**
     * @access private
     * @var ContainerInterface
     */
    private $container;

    /**
     * @access private
     * @var InflectorInterface
     */
    private $inflector;

    /**
     * @access public
     * @param ContainerInterface $container
     * @param InflectorInterface $inflector
     */
    public function __construct(ContainerInterface $container, InflectorInterface $inflector)
    {
        $this->container = $container;
        $this->inflector = $inflector;
    }

    /**
     * @access public
     * @param CommandInterface $command
     * @param callable $next
     * @return mixed
     * @throws InvalidServiceException
     */
    public function execute(CommandInterface $command, callable $next)
    {
        $name = $this->inflector->inflect($command);

        try {
            $commandHandler = $this->container->getService($name);

            return $commandHandler->handle($command);
        } catch (InvalidServiceException $exception) {
            throw $exception;
        }
    }
}
