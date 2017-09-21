<?php

namespace MeetupBundle\Application\DataTransformer\Event;

use MeetupBundle\Application\DataTransformer\DataTransformerInterface;
use MeetupBundle\Domain\Model\Entity\Event;
use MeetupBundle\Infrastructure\Service\FormatConverter\FormatConverterInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class GetEventsDataTransformer
 * @package MeetupBundle\Application\DataTransformer\Event
 */
class GetEventsDataTransformer implements DataTransformerInterface
{
    /**
     * @access private
     * @var FormatConverterInterface
     */
    private $formatConverter;

    /**
     * @access private
     * @var array
     */
    private $events;

    /**
     * @access public
     * @param FormatConverterInterface $formatConverter
     * @param array $events
     */
    public function __construct(FormatConverterInterface $formatConverter, array $events)
    {
        $this->formatConverter = $formatConverter;
        $this->events = $events;
    }

    /**
     * @access public
     * @return mixed
     */
    public function transform()
    {
        $events = array();

        /** @var Event $event */
        foreach ($this->events as $event) {
            $events[] = array(
                'id' => $event->id(),
                'name' => $event->name(),
                'description' => $event->description(),
                'time' => $event->time(),
                'url' => $event->url()
            );
        }

        $data = array(
            'code' => JsonResponse::HTTP_CREATED,
            'status' => 'success',
            'data' => $events
        );

        return $this->formatConverter->convert($data);
    }
}
