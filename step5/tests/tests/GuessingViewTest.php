<?php
require __DIR__ . "/../../vendor/autoload.php";
/** @file
 * Empty unit testing template
 * @cond 
 * Unit tests for the class
 */
use Guessing\GuessingView as GuessingView;
class GuessingTest extends \PHPUnit_Framework_TestCase
{
    const SEED = 1234;

    public function test_construct() {
        $guessing = new Guessing\Guessing(self::SEED);
        $this->assertEquals(23, $guessing->getNumber());

        // Should work with no arguments as well.
        $guessing = new Guessing\Guessing();
    }

    public function test_GuessingView() {
        //test num==0
        $guessing = new Guessing\Guessing();
        $g = new GuessingView($guessing);
        $this->assertContains("Try to guess the number",$g->present());
        $this->assertContains("Guess:",$g->present());
        $this->assertContains("Guessing Game",$g->present());


        // test invalid
        $guessing = new Guessing\Guessing(self::SEED);
        $g = new GuessingView($guessing);
        $guessing->guess(101);
        $this->assertContains("Your guess of 101 is invalid!",$g->present());
        //test valid(too low)
        $guessing = new Guessing\Guessing(self::SEED);
        $g = new GuessingView($guessing);
        $guessing->guess(2);
        $this->assertContains("After 1 guesses you are too low!",$g->present());
        $guessing->guess(50);
        $this->assertContains("After 2 guesses you are too high!",$g->present());
        $guessing->guess(23);
        $this->assertContains("After 3 guesses you are correct!",$g->present());
        $this->assertContains("New Game",$g->present());
    }
}

/// @endcond
