<?php

namespace Tests\Application\DataTransformer;

use MeetupBundle\Application\DataTransformer\ExceptionDataTransformer;
use MeetupBundle\Infrastructure\Service\FormatConverter\NonFormat;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class ExceptionDataTransformerTest
 * @group Application
 * @group Application_DataTransformer
 * @group unit_test
 * @package Tests\Application\DataTransformer
 */
class ExceptionDataTransformerTest extends \PHPUnit_Framework_TestCase
{
    public function test_should_return_data()
    {
        $formatConverter = new NonFormat();
        $message = 'prueba';
        $dataTransformer = new ExceptionDataTransformer($formatConverter, $message);

        $data = $dataTransformer->transform();

        $this->assertCount(3, $data);
        $this->assertEquals(JsonResponse::HTTP_BAD_REQUEST, $data['code']);
        $this->assertEquals('error', $data['status']);
        $this->assertEquals($message, $data['message']);
    }
}
