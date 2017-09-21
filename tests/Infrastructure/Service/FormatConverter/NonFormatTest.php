<?php

namespace Tests\Infrastructure\Service\Inflector;

use MeetupBundle\Infrastructure\Service\FormatConverter\FormatConverterInterface;
use MeetupBundle\Infrastructure\Service\FormatConverter\NonFormat;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Class NonFormatTest
 * @group infrastructure
 * @group infrastructure_services
 * @group infrastructure_services_format_converter
 * @group unit_test
 * @package Tests\Infrastructure\Service\Inflector
 */
class NonFormatTest extends KernelTestCase
{
    /**
     * @access private
     * @var FormatConverterInterface
     */
    private $formatConverter;

    public function setUp()
    {
        $this->formatConverter = new NonFormat();
    }

    public function test_should_be_array()
    {
        $array = ['a' => 'b'];

        $newValue = $this->formatConverter->convert($array);

        $this->assertEquals($array, $newValue);
    }
}
