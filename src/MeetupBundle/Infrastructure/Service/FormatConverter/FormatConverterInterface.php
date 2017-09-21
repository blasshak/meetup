<?php

namespace MeetupBundle\Infrastructure\Service\FormatConverter;

/**
 * Interface FormatConverterInterface
 * @package MeetupBundle\Infrastructure\Service\FormatConverter
 */
interface FormatConverterInterface
{
    /**
     * @access public
     * @param array $data
     * @return mixed
     */
    public function convert($data);
}
