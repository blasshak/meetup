<?php

namespace Tests\Application\Service\Event;

use MeetupBundle\Application\Service\Event\GetEventsService;
use MeetupBundle\Domain\Bus\Command\CommandBusInterface;
use Mockery as m;

/**
 * Class GetEventsServiceTest
 * @group application
 * @group application_service
 * @group application_service_event
 * @group unit_test
 * @package Tests\Application\Service\Event
 */
class GetEventsServiceTest extends \PHPUnit_Framework_TestCase
{
    public function test_should_return_events()
    {
        $eventsExpected = array();
        $commandBusStub = m::mock(CommandBusInterface::class);
        $commandBusStub->shouldReceive('preHandle')->andReturnNull();
        $commandBusStub->shouldReceive('handle')->andReturn($eventsExpected);
        $service = new GetEventsService(array());
        $service->setCommandBus($commandBusStub);
        $request = array('lat' => 1, 'long' => 1);

        $events = $service->execute($request);

        $this->assertEquals($eventsExpected, $events);
    }
}
