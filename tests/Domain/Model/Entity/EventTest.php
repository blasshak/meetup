<?php

namespace Test\Domain\Model\Entity;

use MeetupBundle\Domain\Model\Entity\Event;
use MeetupBundle\Domain\Model\ValueObject\Event\Address;
use MeetupBundle\Domain\Model\ValueObject\Event\Description;
use MeetupBundle\Domain\Model\ValueObject\Event\Id;
use MeetupBundle\Domain\Model\ValueObject\Event\Name;
use MeetupBundle\Domain\Model\ValueObject\Event\Time;
use MeetupBundle\Domain\Model\ValueObject\Event\Url;

/**
 * Class EventsTest
 * @group domain
 * @group domain_model
 * @group domain_model_entity
 * @group unit_test
 * @package Test\Domain\Model\Entity
 */
class EventsTest extends \PHPUnit_Framework_TestCase
{
    public function test_should_create_event_entity()
    {
        $event = Event::create(
            Id::create('111'),
            Name::create('name'),
            Description::create('description'),
            Time::create(111),
            Url::create('url'),
            Address::create('address')
        );

        $this->assertInstanceOf(Event::class, $event);
    }
}
