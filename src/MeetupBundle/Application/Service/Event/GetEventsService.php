<?php

namespace MeetupBundle\Application\Service\Event;

use MeetupBundle\Application\Service\AbstractApplicationService;
use MeetupBundle\Domain\Bus\Command\Event\GetEventsCommand;

/**
 * Class GetEventsService
 * @package MeetupBundle\Application\Service\Event
 */
class GetEventsService extends AbstractApplicationService
{
    /**
     * @access public
     */
    public function __construct()
    {
        parent::__construct(array());
    }

    /**
     * @access public
     * @param array $request
     * @return mixed
     */
    public function execute(array $request)
    {
        $command = GetEventsCommand::create($request);
        $value = $this->commandBus->handle($command);

        return $value;
    }
}
