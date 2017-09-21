<?php

namespace MeetupBundle\Domain\Bus\Command\Event;

use MeetupBundle\Domain\Bus\Command\CommandInterface;

/**
 * Class GetEventsCommand
 * @package MeetupBundle\Domain\Bus\Command\Event
 */
class GetEventsCommand implements CommandInterface
{
    /**
     * @access private
     * @param array $request
     */
    private function __construct(array $request)
    {
    }

    /**
     * @access public
     * @param array $request
     * @return static
     */
    public static function create(array $request)
    {
        return new static($request);
    }
}
