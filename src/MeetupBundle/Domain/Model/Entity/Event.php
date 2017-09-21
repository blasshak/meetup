<?php

namespace MeetupBundle\Domain\Model\Entity;

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
     * @param Id $id
     * @param Name $name
     * @param Description $description
     * @param Time $time
     * @param Url $url
     */
    private function __construct(Id $id, Name $name, Description $description, Time $time, Url $url)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->time = $time;
        $this->url = $url;
    }

    /**
     * @param Id $id
     * @param Name $name
     * @param Description $description
     * @param Time $time
     * @param Url $url
     * @return self
     */
    public static function create(Id $id, Name $name, Description $description, Time $time, Url $url)
    {
        return new self($id, $name, $description, $time, $url);
    }

    /**
     * @access public
     * @return string
     */
    public function id()
    {
        return $this->id->value();
    }

    /**
     * @access public
     * @return string
     */
    public function name()
    {
        return $this->name->value();
    }

    /**
     * @access public
     * @return string
     */
    public function description()
    {
        return $this->description->value();
    }

    /**
     * @access public
     * @return string
     */
    public function time()
    {
        return $this->time->value();
    }

    /**
     * @access public
     * @return string
     */
    public function url()
    {
        return $this->url->value();
    }
}
