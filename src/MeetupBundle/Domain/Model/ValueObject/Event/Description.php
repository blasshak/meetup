<?php

namespace MeetupBundle\Domain\Model\ValueObject\Event;

use MeetupBundle\Infrastructure\ValueObject\AbstractValueObject;

/**
 * Class Description
 * @package MeetupBundle\Domain\Model\ValueObject\Event
 */
class Description extends AbstractValueObject
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
