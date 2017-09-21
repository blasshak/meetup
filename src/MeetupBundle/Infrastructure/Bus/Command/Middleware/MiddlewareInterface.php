<?php

namespace MeetupBundle\Infrastructure\Bus\Command\Middleware;

use MeetupBundle\Domain\Bus\Command\CommandInterface;

/**
 * Interface MiddlewareInterface
 * @package MeetupBundle\Infrastructure\Bus\Command\Middleware
 */
interface MiddlewareInterface
{
    /**
     * @access public
     * @param CommandInterface $command
     * @param callable $next
     * @return mixed
     */
    public function execute(CommandInterface $command, callable $next);
}
