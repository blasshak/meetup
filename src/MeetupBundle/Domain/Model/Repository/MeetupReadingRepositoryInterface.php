<?php

namespace MeetupBundle\Domain\Model\Repository;

/**
 * Interface MeetupReadingRepositoryInterface
 * @package MeetupBundle\Domain\Model\Repository
 */
interface MeetupReadingRepositoryInterface
{
    /**
     * @access public
     * @param array $args
     * @return array
     */
    public function findEventsBy(array $args) : array;
}
