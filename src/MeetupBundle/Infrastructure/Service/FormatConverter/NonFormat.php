<?php

namespace MeetupBundle\Infrastructure\Service\FormatConverter;

/**
 * Class NonFormat
 * @package MeetupBundle\Infrastructure\Service\FormatConverter
 */
class NonFormat implements FormatConverterInterface
{
    /**
     * @access public
     * @param array $data
     * @return array
     */
    public function convert($data)
    {
        return $data;
    }
}
