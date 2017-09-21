<?php

namespace Tests\Domain\Bus\Command\Event;

use MeetupBundle\Domain\Bus\Command\CommandHandlerInterface;
use MeetupBundle\Domain\Bus\Command\CommandInterface;
use MeetupBundle\Domain\Bus\Command\Event\GetEventsCommand;
use MeetupBundle\Domain\Bus\Command\Event\GetEventsCommandHandler;
use MeetupBundle\Domain\Model\Entity\Event;
use MeetupBundle\Domain\Model\Factory\EventFactoryInterface;
use MeetupBundle\Domain\Model\Repository\MeetupReadingRepositoryInterface;
use Mockery as m;

/**
 * Class GetEventsCommandHandlerTest
 * @group domain
 * @group domain_bus
 * @group domain_bus_command
 * @group domain_bus_command_event
 * @group integration_test
 * @package Tests\Domain\Bus\Command\Event
 */
class GetEventsCommandHandlerTest extends \PHPUnit_Framework_TestCase
{
    public function test_should_get_events()
    {
        $expectedEvents = array($this->createEventEntity(), $this->createEventEntity());
        $events = array($this->createEventArray(), $this->createEventArray());
        $request = array('count' => 1, 'lat' => 1, 'long' => 1);
        $command = $this->createCommand($request);
        $meetupRepository = $this->createMeetupRepository($events);
        $eventFactory = $this->createEventFactory($this->createEventEntity());
        $commandHandler = $this->createCommandHandler($meetupRepository, $eventFactory);

        $events = $commandHandler->handle($command);

        $this->assertEquals($expectedEvents, $events);
    }


    /**
     * @access private
     * @return array
     */
    private function createEventArray()
    {
        $event = array(
            'id' => 'id',
            'name' => 'prueba',
            'description' => 'description',
            'time' => 1505373221000,
            'event_url' => 'https://www.meetup.com/The-Barcelona-Road-Cycling-Group/events/243007289/',
            'venue' => array(
                'country' => 'es',
                'localized_country_name' => 'Spain',
                'city' => 'barcelona',
                'address_1' => 'Via Layetana, 1',
                'lon' => 2.181488,
                'lat' => 41.381885
            )
        );

        return $event;
    }

    /**
     * @access private
     * @return Event
     */
    private function createEventEntity()
    {
        $event = m::mock(Event::class);

        return $event;
    }

    /**
     * @access private
     * @param array $request
     * @return CommandInterface
     */
    private function createCommand($request)
    {
        $command = GetEventsCommand::create($request);

        return $command;
    }

    /**
     * @access private
     * @param $events
     * @return MeetupRepositoryInterface
     */
    private function createMeetupRepository($events)
    {
        $apiRepository = m::mock(MeetupReadingRepositoryInterface::class);

        $apiRepository->shouldReceive('findEventsBy')->andReturn($events);

        return $apiRepository;
    }

    /**
     * @access private
     * @param $events
     * @return EventFactoryInterface
     */
    private function createEventFactory($events)
    {
        $eventFactory = m::mock(EventFactoryInterface::class);

        $eventFactory->shouldReceive('create')->andReturn($events);

        return $eventFactory;
    }

    /**
     * @access private
     * @param MeetupReadingRepositoryInterface $meetupRepository
     * @param EventFactoryInterface $eventFactory
     * @return CommandHandlerInterface
     */
    private function createCommandHandler(
        MeetupReadingRepositoryInterface $meetupRepository,
        EventFactoryInterface $eventFactory
    ) {
        $commandHandler = new GetEventsCommandHandler($meetupRepository, $eventFactory);

        return $commandHandler;
    }
}
