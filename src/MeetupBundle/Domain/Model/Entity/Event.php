<?php

namespace MeetupBundle\Domain\Model\Entity;

use MeetupBundle\Domain\Model\ValueObject\Event\Address;
use MeetupBundle\Domain\Model\ValueObject\Event\Description;
use MeetupBundle\Domain\Model\ValueObject\Event\Id;
use MeetupBundle\Domain\Model\ValueObject\Event\Name;
use MeetupBundle\Domain\Model\ValueObject\Event\Time;
use MeetupBundle\Domain\Model\ValueObject\Event\Url;

/**
 * Class Event
 * @package MeetupBundle\Domain\Model\Entity
 */
class Event
{
    /**
    @access private
     * @var Id
     */
    private $id;

    /**
     * @access private
     * @var Name
     */
    private $name;

    /**
     * @access private
     * @var Description
     */
    private $description;

    /**
     * @access private
     * @var Time
     */
    private $time;

    /**
     * @access private
     * @var Url
     */
    private $url;

    /**
     * @access private
     * @var Address
     */
    private $address;

    /**
     * @access private
     * @param Id $id
     * @param Name $name
     * @param Description $description
     * @param Time $time
     * @param Url $url
     * @param Address $address
     */
    private function __construct(Id $id, Name $name, Description $description, Time $time, Url $url, Address $address)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->time = $time;
        $this->url = $url;
        $this->address = $address;
    }

    /**
     * @param Id $id
     * @param Name $name
     * @param Description $description
     * @param Time $time
     * @param Url $url
     * @param Address $address
     * @return self
     */
    public static function create(Id $id, Name $name, Description $description, Time $time, Url $url, Address $address)
    {
        return new self($id, $name, $description, $time, $url, $address);
    }
}
