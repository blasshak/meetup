<?php

namespace Test\Domain\Bus\Command\Event;

use MeetupBundle\Domain\Bus\Command\Exception\InvalidRequestException;
use MeetupBundle\Domain\Bus\Command\Event\GetEventsCommand;

/**
 * Class GetEventsCommandTest
 * @group domain
 * @group domain_Bus
 * @group domain_Bus_command
 * @group domain_Bus_command_event
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

    public function test_should_require_count_not_empty()
    {
        $request = array('count' => 0, 'lat' => 1, 'long' => 1);

        $this->expectException(InvalidRequestException::class);

        GetEventsCommand::create($request);
    }

    public function test_should_require_lat_not_empty()
    {
        $request = array('count' => 1, 'lat' => '', 'long' => 1);

        $this->expectException(InvalidRequestException::class);

        GetEventsCommand::create($request);
    }

    public function test_should_require_long_not_empty()
    {
        $request = array('count' => 1, 'lat' => 1, 'long' => 0);

        $this->expectException(InvalidRequestException::class);

        GetEventsCommand::create($request);
    }

    public function test_should_create_new_command()
    {
        $request = array('count' => 1, 'lat' => 1, 'long' => 1);

        $command = GetEventsCommand::create($request);

        $this->assertEquals($request['count'], $command->count());
        $this->assertEquals($request['lat'], $command->lat());
        $this->assertEquals($request['long'], $command->long());
    }
}
