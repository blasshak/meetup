<?php

namespace MeetupBundle\Domain\Model\Factory;

use MeetupBundle\Domain\Model\Entity\Event;
use MeetupBundle\Domain\Model\ValueObject\Event\Description;
use MeetupBundle\Domain\Model\ValueObject\Event\Id;
use MeetupBundle\Domain\Model\ValueObject\Event\Name;
use MeetupBundle\Domain\Model\ValueObject\Event\Time;
use MeetupBundle\Domain\Model\ValueObject\Event\Url;

/**
 * Interface EventFactoryInterface
 * @package MeetupBundle\Domain\Model\Factory
 */
interface EventFactoryInterface
{
    /**
     * @param Id $id
     * @param Name $name
     * @param Description $description
     * @param Time $time
     * @param Url $url
     * @return Event
     */
    public function create(Id $id, Name $name, Description $description, Time $time, Url $url): Event;
}
