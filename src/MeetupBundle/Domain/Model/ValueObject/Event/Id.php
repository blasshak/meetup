<?php

namespace MeetupBundle\Domain\Model\ValueObject\Event;

use MeetupBundle\Infrastructure\ValueObject\AbstractValueObject;
use Rhumsaa\Uuid\Uuid;

/**
 * Class Id
 * @package MeetupBundle\Domain\Model\ValueObject\Event
 */
class Id extends AbstractValueObject
{
    /**
     * @access protected
     * @param $value
     */
    protected function __construct($value)
    {
        if (empty($value)) {
            $value = Uuid::uuid4()->toString();
        }

        $this->setValue($value);
    }
}
