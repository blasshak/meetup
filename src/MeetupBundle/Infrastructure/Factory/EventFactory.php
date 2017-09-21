<?php

namespace MeetupBundle\Infrastructure\Factory;

use MeetupBundle\Domain\Model\Entity\Event;
use MeetupBundle\Domain\Model\ValueObject\Event\Address;
use MeetupBundle\Domain\Model\ValueObject\Event\Description;
use MeetupBundle\Domain\Model\ValueObject\Event\Id;
use MeetupBundle\Domain\Model\ValueObject\Event\Name;
use MeetupBundle\Domain\Model\ValueObject\Event\Time;
use MeetupBundle\Domain\Model\ValueObject\Event\Url;
use MeetupBundle\Domain\Model\Factory\EventFactoryInterface;

/**
 * Class EventFactory
 * @package MeetupBundle\Infrastructure\Factory
 */
class EventFactory implements EventFactoryInterface
{
    /**
     * @param Id $id
     * @param Name $name
     * @param Description $description
     * @param Time $time
     * @param Url $url
     * @param Address $address
     * @return Event
     */
    public function create(Id $id, Name $name, Description $description, Time $time, Url $url, Address $address) : Event
    {
        $event = Event::create($id, $name, $description, $time, $url, $address);

        return $event;
    }
}
