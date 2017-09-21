<?php

namespace Tests\Application\DataTransformer\Event;

use MeetupBundle\Domain\Model\Entity\Event;
use MeetupBundle\Domain\Model\ValueObject\Event\Address;
use MeetupBundle\Domain\Model\ValueObject\Event\Description;
use MeetupBundle\Domain\Model\ValueObject\Event\Id;
use MeetupBundle\Domain\Model\ValueObject\Event\Name;
use MeetupBundle\Domain\Model\ValueObject\Event\Time;
use MeetupBundle\Domain\Model\ValueObject\Event\Url;
use MeetupBundle\Application\DataTransformer\Event\GetEventsDataTransformer;
use MeetupBundle\Infrastructure\Service\FormatConverter\NonFormat;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class GetEventsDataTransformerTest
 * @group Application
 * @group Application_DataTransformer
 * @group Application_DataTransformer_event
 * @group unit_test
 * @package Tests\Application\DataTransformer\Event
 */
class GetEventsDataTransformerTest extends \PHPUnit_Framework_TestCase
{
    public function test_should_return_zero_events()
    {
        $formatConverter = new NonFormat();
        $tweets = array();
        $dataTransformer = new GetEventsDataTransformer($formatConverter, $tweets);

        $data = $dataTransformer->transform();

        $this->assertCount(3, $data);
        $this->assertEquals(JsonResponse::HTTP_CREATED, $data['code']);
        $this->assertEquals('success', $data['status']);
        $this->assertEquals($tweets, $data['data']);
    }

    public function test_should_return_one_events()
    {
        $formatConverter = new NonFormat();
        $events = array(Event::create(
            Id::create('111'),
            Name::create('name'),
            Description::create('description'),
            Time::create(111),
            Url::create('url'),
            Address::create('address')
        ));
        $dataTransformer = new GetEventsDataTransformer($formatConverter, $events);

        $data = $dataTransformer->transform();

        $this->assertCount(3, $data);
        $this->assertEquals(JsonResponse::HTTP_CREATED, $data['code']);
        $this->assertEquals('success', $data['status']);
        $this->assertEquals(
            array(
                array(
                    'id' => '111',
                    'name' => 'name',
                    'description' => 'description',
                    'time' => 111,
                    'id' => '111',
                    'url' => 'url',
                    'address' => 'address'
                )
            ),
            $data['data']
        );
    }
}
