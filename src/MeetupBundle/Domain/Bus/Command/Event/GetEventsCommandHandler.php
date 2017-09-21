<?php

namespace MeetupBundle\Domain\Bus\Command\Event;

use MeetupBundle\Domain\Bus\Command\CommandInterface;
use MeetupBundle\Domain\Model\Factory\EventFactoryInterface;
use MeetupBundle\Domain\Model\Repository\MeetupReadingRepositoryInterface;
use MeetupBundle\Domain\Model\ValueObject\Event\Description;
use MeetupBundle\Domain\Model\ValueObject\Event\Id;
use MeetupBundle\Domain\Model\ValueObject\Event\Name;
use MeetupBundle\Domain\Model\ValueObject\Event\Time;
use MeetupBundle\Domain\Model\ValueObject\Event\Url;

/**
 * Class GetEventsCommandHandler
 * @package MeetupBundle\Domain\Bus\Command\Event
 */
class GetEventsCommandHandler implements CommandInterface
{
    /**
     * @access private
     * @var MeetupReadingRepositoryInterface
     */
    private $meetupRepository;

    /**
     * @access private
     * @var EventFactoryInterface
     */
    private $eventFactory;

    /**
     * @access public
     * @param MeetupReadingRepositoryInterface $meetupRepository
     * @param EventFactoryInterface $eventFactory
     */
    public function __construct(MeetupReadingRepositoryInterface $meetupRepository, EventFactoryInterface $eventFactory)
    {
        $this->meetupRepository = $meetupRepository;
        $this->eventFactory = $eventFactory;
    }

    /**
     * @access public
     * @param CommandInterface $command
     * @return array
     */
    public function handle(CommandInterface $command) : array
    {
        $eventCollections = array();
        $parms = array('lat' => $command->lat(), 'lon' => $command->long());
        $events = $this->meetupRepository->findEventsBy($parms);

        foreach ($events as $event) {
            $eventCollections[] = $this->eventFactory->create(
                Id::create($event['id']),
                Name::create($event['name']),
                Description::create(!empty($event['description']) ? $event['description'] : ''),
                Time::create($event['time']),
                Url::create($event['event_url'])
            );
        }

        return $eventCollections;
    }
}
