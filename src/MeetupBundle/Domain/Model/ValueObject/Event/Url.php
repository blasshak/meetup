<?php

namespace MeetupBundle\Domain\Model\ValueObject\Event;

use MeetupBundle\Infrastructure\ValueObject\AbstractValueObject;

/**
 * Class Url
 * @package MeetupBundle\Domain\Model\ValueObject\Event
 */
class Url extends AbstractValueObject
{
    /**
     * @access protected
     * @param $value
     */
    protected function __construct($value)
    {
        $this->setValue($value);
    }
}
