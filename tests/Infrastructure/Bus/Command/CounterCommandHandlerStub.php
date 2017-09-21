<?php

namespace Tests\Infrastructure\Bus\Command;

use MeetupBundle\Domain\Bus\Command\CommandHandlerInterface;
use MeetupBundle\Domain\Bus\Command\CommandInterface;

/**
 * Class CounterCommandHandlerStub
 * @package Tests\Infrastructure\Bus\Command
 */
class CounterCommandHandlerStub implements CommandHandlerInterface
{
    /**
     * @access public
     * @param CommandInterface $command
     * @return int
     */
    public function handle(CommandInterface $command)
    {
        $num = $command->num();
        $num++;

        return $num;
    }
}
