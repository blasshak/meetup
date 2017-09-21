<?php

namespace MeetupBundle\Infrastructure\Service\Container;

/**
 * Interface ContainerInterface
 * @package MeetupBundle\Infrastructure\Service\Container
 */
interface ContainerInterface
{
    /**
     * @access public
     * @param string $name
     * @return mixed
     */
    public function getService($name);
}
