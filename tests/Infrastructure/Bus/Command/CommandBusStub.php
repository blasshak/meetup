<?php

namespace Tests\Infrastructure\Bus\Command;

use MeetupBundle\Infrastructure\Bus\Command\CommandBus;

/**
 * Class CommandBusStub
 * @package Tests\Infrastructure\Bus\Command
 */
class CommandBusStub extends CommandBus
{
    /**
     * @access public
     * @return array
     */
    public function getMiddlewares() : array
    {
        return $this->middlewares;
    }
}
