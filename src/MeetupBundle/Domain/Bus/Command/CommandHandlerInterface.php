<?php

namespace MeetupBundle\Domain\Bus\Command;

/**
 * Interface CommandHandlerInterface
 * @package MeetupBundle\Domain\Bus\Command
 */
interface CommandHandlerInterface
{
    /**
     * @access public
     * @param CommandInterface $command
     * @return mixed
     */
    public function handle(CommandInterface $command);
}
