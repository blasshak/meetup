<?php

namespace MeetupBundle\Application\Service;

use MeetupBundle\Domain\Bus\Command\CommandBusInterface;

/**
 * Class AbstractApplicationService
 * @package MeetupBundle\Application\Service
 */
abstract class AbstractApplicationService implements ApplicationServiceInterface
{
    /**
     * @access private
     * @var array
     */
    private $middlewares;

    /**
     * @access protected
     * @var CommandBusInterface
     */
    protected $commandBus;

    /**
     * @access public
     * @param array $middlewares
     */
    public function __construct($middlewares)
    {
        $this->middlewares = $middlewares;
    }

    /**
     * @access public
     * @param CommandBusInterface $commandBus
     */
    public function setCommandBus(CommandBusInterface $commandBus)
    {
        $this->commandBus = $commandBus;
        $this->commandBus->preHandle($this->middlewares);
    }

    /**
     * @access public
     * @param array $request
     * @return array
     */
    abstract public function execute(array $request);
}
