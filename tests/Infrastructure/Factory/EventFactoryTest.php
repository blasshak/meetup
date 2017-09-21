<?php

namespace Tests\Infrastructure\Factory;

use MeetupBundle\Domain\Model\Entity\Event;
use MeetupBundle\Domain\Model\Factory\EventFactoryInterface;
use MeetupBundle\Domain\Model\ValueObject\Event\Description;
use MeetupBundle\Domain\Model\ValueObject\Event\Id;
use MeetupBundle\Domain\Model\ValueObject\Event\Name;
use MeetupBundle\Domain\Model\ValueObject\Event\Time;
use MeetupBundle\Domain\Model\ValueObject\Event\Url;
use MeetupBundle\Infrastructure\Factory\EventFactory;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

/**
 * Class EventFactoryTest
 * @group infrastructure
 * @group infrastructure_factory
 * @group unit_test
 * @package Tests\Infrastructure\Factory
 */
class EventFactoryTest extends TestCase
{
    public function test_should_create_event_entity()
    {
        $eventFactory = $this->createEventFactory();

        $event = $eventFactory->create(
            Id::create('111'),
            Name::create('name'),
            Description::create('description'),
            Time::create(111),
            Url::create('url')
        );

        $this->assertInstanceOf(Event::class, $event);
    }

    /**
     * @access private
     * @return EventFactoryInterface
     */
    private function createEventFactory()
    {
        return new EventFactory();
    }
}
