<?php
/**
 * Created by PhpStorm.
 * User: Chang Ge
 * Date: 5/28/2018
 * Time: 12:36 PM
 */

namespace Wumpus;


class WumpusController
{
    /**
     * Constructor
     * @param Wumpus $wumpus The Wumpus object
     * @param array $get The $_GET array
     */
    public function __construct(Wumpus $wumpus, $get) {
        $this->wumpus = $wumpus;
        if(isset($get['m'])) {
            $this->move($get['m']);
        }
        else if(isset($get['s'])) {
            $this->shoot($get['s']);
        }
        else if(isset($get['n'])) {
            // New game!
            $this->reset = true;
        }
        else if(isset($get['c'])){
            //cheating!
            $this->set_cheat=true;
        }

    }
    public function isReset(){
        return $this->reset;
    }
    public function getPage(){
        return $this->page;
    }

    /**
     * Move request
     * @param int $ndx Index for room to move to
     */
    private function move($ndx) {
// Simple error check
        if(!is_numeric($ndx) || $ndx < 1 || $ndx > Wumpus::NUM_ROOMS) {
            return;
        }
        switch($this->wumpus->move($ndx)) {
            case Wumpus::HAPPY:
                break;

            case Wumpus::EATEN:
            case Wumpus::FELL:
                $this->reset = true;
                $this->page = 'lose.php';
                break;
        }
    }
    /**
     * Shoot request
     * @param int $ndx Index for room to shoot into
     */
    private function shoot($ndx) {
        if(!is_numeric($ndx) || $ndx < 1 || $ndx > Wumpus::NUM_ROOMS) {
            return;
        }
        if($this->wumpus->numArrows() == 0){
            return;
        }

        switch($this->wumpus->shoot($ndx)) {
            case false:
                break;
            case true:
                $this->reset = true;
                $this->page = 'win.php';
                break;

        }
    }

    public function cheat(){
        return $this->set_cheat;
    }
    private $wumpus;                // The Wumpus object we are controlling
    private $page = 'game.php';     // The next page we will go to
    private $reset = false;         // True if we need to reset the game
    private $set_cheat=false;
}