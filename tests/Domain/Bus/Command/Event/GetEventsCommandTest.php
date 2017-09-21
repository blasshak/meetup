<?php

namespace Test\Domain\Bus\Command\Event;

use MeetupBundle\Domain\Bus\Command\Exception\InvalidRequestException;
use MeetupBundle\Domain\Bus\Command\Event\GetEventsCommand;

/**
 * Class GetEventsCommandTest
 * @group domain
 * @group domain_bus
 * @group domain_bus_command
 * @group domain_bus_command_event
 * @group unit_test
 * @package Tests\Domain\Bus\Command\Event
 */
class GetEventsCommandTest extends \PHPUnit_Framework_TestCase
{
    public function test_should_require_valid_params()
    {
        $request = array();

        $this->expectException(InvalidRequestException::class);

        GetEventsCommand::create($request);
    }

    public function test_should_require_lat_not_empty()
    {
        $request = array('lat' => '', 'long' => 1);

        $this->expectException(InvalidRequestException::class);

        GetEventsCommand::create($request);
    }

    public function test_should_require_long_not_empty()
    {
        $request = array('lat' => 1, 'long' => 0);

        $this->expectException(InvalidRequestException::class);

        GetEventsCommand::create($request);
    }

    public function test_should_create_new_command()
    {
        $request = array('lat' => 1, 'long' => 1);

        $command = GetEventsCommand::create($request);

        $this->assertEquals($request['lat'], $command->lat());
        $this->assertEquals($request['long'], $command->long());
    }
}
