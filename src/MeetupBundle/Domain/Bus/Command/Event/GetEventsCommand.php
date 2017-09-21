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
        if (empty($request['lat']) || empty($request['long'])) {
            throw new InvalidRequestException(InvalidRequestException::MESSAGE);
        }

        return new static($request);
    }

    /**
     * @access public
     * @return float
     */
    public function lat() : float
    {
        return $this->lat;
    }

    /**
     * @access public
     * @return float
     */
    public function long() : float
    {
        return $this->long;
    }
}
