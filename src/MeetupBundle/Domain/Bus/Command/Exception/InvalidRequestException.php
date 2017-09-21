<?php

namespace MeetupBundle\Domain\Bus\Command\Exception;

/**
 * Class InvalidRequestException
 * @package MeetupBundle\Domain\Bus\Command\Exception
 */
class InvalidRequestException extends \Exception
{
    const MESSAGE = 'Invalid request';
}
