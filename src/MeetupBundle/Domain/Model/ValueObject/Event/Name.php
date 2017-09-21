<?php

namespace MeetupBundle\Domain\Model\ValueObject\Event;

use MeetupBundle\Infrastructure\ValueObject\AbstractValueObject;

/**
 * Class Name
 * @package MeetupBundle\Domain\Model\ValueObject\Event
 */
class Name extends AbstractValueObject
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
