<?php

namespace MeetupBundle\Application\DataTransformer;

/**
 * Interface DataTransformerInterface
 * @package MeetupBundle\Application\DataTransformer
 */
interface DataTransformerInterface
{
    /**
     * @access public
     * @return mixed
     */
    public function transform();
}
