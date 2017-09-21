<?php

namespace Tests\Infrastructure\Bus\Command;

use MeetupBundle\Domain\Bus\Command\CommandInterface;

/**
 * Class CounterCommandStub
 * @package Tests\Infrastructure\Bus\Command
 */
class CounterCommandStub implements CommandInterface
{
    /**
     * @access private
     * @var int
     */
    private $num;

    /**
     * @access public
     * @param int $num
     */
    public function __construct($num)
    {
        $this->num = $num;
    }

    /**
     * @access public
     * @return int
     */
    public function num()
    {
        return $this->num;
    }
}
