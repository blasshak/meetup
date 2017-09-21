<?php

namespace MeetupBundle\Domain\Bus\Command\Event;

use MeetupBundle\Domain\Bus\Command\CommandInterface;
use MeetupBundle\Domain\Bus\Command\Exception\InvalidRequestException;

/**
 * Class GetEventsCommand
 * @package MeetupBundle\Domain\Bus\Command\Event
 */
class GetEventsCommand implements CommandInterface
{
    /**
     * @access private
     * @var int
     */
    private $count;

    /**
     * @access private
     * @var float
     */
    private $lat;

    /**
     * @access private
     * @var float
     */
    private $long;

    /**
     * @access private
     * @param array $request
     */
    private function __construct(array $request)
    {
        $this->count = $request['count'];
        $this->lat = $request['lat'];
        $this->long = $request['long'];
    }

    /**
     * @access public
     * @param array $request
     * @return static
     * @throws InvalidRequestException
     */
    public static function create(array $request)
    {
        if (empty($request['count']) || empty($request['lat']) || empty($request['long'])) {
            throw new InvalidRequestException(InvalidRequestException::MESSAGE);
        }

        return new static($request);
    }

    /**
     * @access public
     * @return int
     */
    public function count() : int
    {
        return $this->count;
    }

    /**
     * @access public
     * @return int
     */
    public function lat() : int
    {
        return $this->count;
    }

    /**
     * @access public
     * @return int
     */
    public function long() : int
    {
        return $this->count;
    }
}
