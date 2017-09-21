<?php

namespace MeetupBundle\Infrastructure\Symfony\Controller;

use MeetupBundle\Application\DataTransformer\Event\GetEventsDataTransformer;
use MeetupBundle\Application\DataTransformer\ExceptionDataTransformer;
use MeetupBundle\Application\Service\Event\GetEventsService;
use MeetupBundle\Infrastructure\Service\FormatConverter\NonFormat;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class EventsController
 * @package MeetupBundle\Infrastructure\Symfony\Controller
 */
class EventsController extends Controller
{
    /**
     * @access public
     * @param float $lat
     * @param float $long
     * @return JsonResponse
     */
    public function getAction(float $lat, float $long)
    {
        /** @var GetEventsService $getEventsService */
        $getEventsService = $this->get('mb.application.get_events_service');
        $formatConverter = new NonFormat();

        try {
            $events = $getEventsService->execute(array('lat' => $lat, 'long' => $long));
            $dataTransformer = new GetEventsDataTransformer($formatConverter, $events);
        } catch (\Exception $exception) {
            $dataTransformer = new ExceptionDataTransformer($formatConverter, $exception->getMessage());
        } finally {
            $data = $dataTransformer->transform();
            $response = new JsonResponse($data, $data['code'], array('Content-Type' => 'application/json'));
        }

        $response->setMaxAge(60 * 60 * 24 * 365);
        $response->setSharedMaxAge(60 * 60 * 24 * 365);

        return $response;
    }
}
