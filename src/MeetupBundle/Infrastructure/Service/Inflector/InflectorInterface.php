<?php

namespace MeetupBundle\Infrastructure\Service\Inflector;

use MeetupBundle\Domain\Bus\Command\CommandInterface;

/**
 * Interface InflectorInterface
 * @package MeetupBundle\Infrastructure\Service\Inflector
 */
interface InflectorInterface
{
    /**
     * @access public
     * @param CommandInterface $command
     * @return string
     */
    public function inflect(CommandInterface $command) : string;
}
