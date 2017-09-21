<?php

namespace MeetupBundle\Application\Service;

/**
 * Interface ApplicationServiceInterface
 * @package MeetupBundle\Application\Service
 */
interface ApplicationServiceInterface
{
    /**
     * @access public
     * @param array $request
     * @return array
     */
    public function execute(array $request);
}
