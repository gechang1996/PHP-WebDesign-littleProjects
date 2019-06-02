<?php
require __DIR__ . "/../../vendor/autoload.php";
/** @file
 * Empty unit testing template
 * @cond 
 * Unit tests for the class
 */
use Guessing\Guessing as Guessing;
use Guessing\GuessingController as Controller;

class GuessingTest extends \PHPUnit_Framework_TestCase
{
    const SEED = 1234;

    public function test_reset() {
        $guessing = new Guessing(self::SEED);
        $controller = new Controller($guessing, array('value' => 12));
        $this->assertFalse($controller->isReset());

        $guessing = new Guessing(self::SEED);
        $controller = new Controller($guessing, array('clear' => 'New Game'));
        $this->assertTrue($controller->isReset());

        $guessing = new Guessing(self::SEED);
        $controller = new Controller($guessing, array('value' => 101));
        $this->assertFalse($controller->isReset());

        $guessing = new Guessing(self::SEED);
        $controller = new Controller($guessing, array('value' => 80));
        $this->assertFalse($controller->isReset());

        $guessing = new Guessing(self::SEED);
        $controller = new Controller($guessing, array('value' => 0));
        $this->assertFalse($controller->isReset());


    }
}

/// @endcond
