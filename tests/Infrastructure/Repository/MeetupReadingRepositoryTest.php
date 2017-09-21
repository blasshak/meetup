<?php

namespace Tests\Infrastructure\Repository;

use MeetupBundle\Domain\Model\Repository\MeetupReadingRepositoryInterface;
use MeetupBundle\Infrastructure\Repository\MeetupReadingRepository;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

/**
 * Class MeetupReadingRepositoryTest
 * @group infrastructure
 * @group infrastructure_repository
 * @group integration_test
 * @package Tests\Infrastructure\Repository
 */
class MeetupReadingRepositoryTest extends TestCase
{
    public function test_should_create_event_entity()
    {
        $config = array('key' => '1914239651b217b167e27121d172b3c');
        $meetupReadingReposiroty = $this->createMeetupReadingRepository($config);
        $params = array('lat' => 41.490047, 'lon' => 2.139761);

        $events = $meetupReadingReposiroty->findEventsBy($params);

        $this->assertNotEmpty($events);
    }

    /**
     * @access private
     * @return MeetupReadingRepositoryInterface
     */
    private function createMeetupReadingRepository(array $config)
    {
        return new MeetupReadingRepository($config);
    }
}
