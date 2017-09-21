<?php

namespace Tests\Infrastructure\Service\Inflector;

use MeetupBundle\Infrastructure\Service\Inflector\InflectorInterface;
use MeetupBundle\Infrastructure\Service\Inflector\CommandHandlerName;
use Tests\Infrastructure\Bus\Command\DummyCommand;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Class CommandHandlerNameTest
 * @group infrastructure
 * @group infrastructure_services
 * @group infrastructure_services_inflector
 * @group unit_test
 * @package Tests\Infrastructure\Service\Inflector
 */
class CommandHandlerNameTest extends KernelTestCase
{
    /**
     * @access private
     * @var InflectorInterface
     */
    private $inflector;

    public function setUp()
    {
        $this->inflector = new CommandHandlerName();
    }

    public function test_should_get_handler_name_from_command()
    {
        $command = new DummyCommand();

        $name = $this->inflector->inflect($command);

        $this->assertEquals('infrastructure.dummy_command_handler', $name);
    }
}
