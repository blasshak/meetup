<?php

namespace MeetupBundle\Infrastructure\Service\Container;

/**
 * Class InvalidServiceException
 * @package MeetupBundle\Infrastructure\Service\Container
 */
class InvalidServiceException extends \Exception
{
    /**
     * @access public
     * @param $name
     * @return InvalidServiceException
     */
    public static function fromServiceName($name) : InvalidServiceException
    {
        return new static(sprintf('The container not have service called %d', $name));
    }
}
