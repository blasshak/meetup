<?php

namespace MeetupBundle\Infrastructure\Repository;

use DMS\Service\Meetup\MeetupKeyAuthClient;
use MeetupBundle\Domain\Model\Repository\MeetupReadingRepositoryInterface;

/**
 * Interface MeetupReadingRepository
 * @package MeetupBundle\Infrastructure\Repository
 */
class MeetupReadingRepository implements MeetupReadingRepositoryInterface
{
    /**
     * @access private
     * @var MeetupKeyAuthClient
     */
    private $client;

    /**
     * @access public
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->client = MeetupKeyAuthClient::factory($config);
    }

    /**
     * @access public
     * @param array $args
     * @return array
     */
    public function findEventsBy(array $args) : array
    {
        $events = $this->client->getOpenEvents($args);
        $eventsArray = $events->getData();

        return $eventsArray;
    }
}
