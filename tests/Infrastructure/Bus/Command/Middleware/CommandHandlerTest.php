<?php

namespace Tests\Infrastructure\Bus\Command\Middleware;

use MeetupBundle\Infrastructure\Bus\Command\Middleware\CommandHandler;
use MeetupBundle\Infrastructure\Service\Container\InvalidServiceException;
use MeetupBundle\Infrastructure\Service\Container\Symfony;
use MeetupBundle\Infrastructure\Service\Inflector\CommandHandlerName;
use Tests\Infrastructure\Bus\Command\CounterCommandHandlerStub;
use Tests\Infrastructure\Bus\Command\CounterCommandStub;
use Tests\Infrastructure\Service\Container\SymfonyStub;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

/**
 * Class CommandHandlerTest
 * @group infrastructure
 * @group infrastructure_bus_command_middleware
 * @group unit_test
 * @package Tests\Infrastructure\Bus\Command\Middleware
 */
class CommandHandlerTest extends TestCase
{
    public function test_should_executed_unsuccessfully()
    {
        $containerStub = new SymfonyStub();
        $containerStub->set('counter_command_stub_handlers', new CounterCommandHandlerStub());
        $container = new Symfony($containerStub);
        $inflector = new CommandHandlerName();
        $commandHandler = new CommandHandler($container, $inflector);
        $num = 1;
        $command = new CounterCommandStub($num);
        $lastCallable = function () {
        };

        $this->expectException(InvalidServiceException::class);

        $commandHandler->execute($command, $lastCallable);
    }

    public function test_should_executed_successfully()
    {
        $containerStub = new SymfonyStub();
        $containerStub->set('infrastructure.counter_command_stub_handler', new CounterCommandHandlerStub());
        $container = new Symfony($containerStub);
        $inflector = new CommandHandlerName();
        $commandHandler = new CommandHandler($container, $inflector);
        $num = 1;
        $command = new CounterCommandStub($num);
        $lastCallable = function () {
        };

        $num = $commandHandler->execute($command, $lastCallable);

        $this->assertEquals(2, $num);
    }
}
