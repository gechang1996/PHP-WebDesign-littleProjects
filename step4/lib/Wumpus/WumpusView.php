<?php
/**
 * Created by PhpStorm.
 * User: Chang Ge
 * Date: 5/28/2018
 * Time: 1:02 AM
 */

namespace Wumpus;


class WumpusView
{
    /**
     * Constructor
     * @param Wumpus $wumpus The Wumpus object
     */
    public function __construct(Wumpus $wumpus) {
        $this->wumpus = $wumpus;
    }
    private $wumpus;    // The Wumpus object
    /**
     * Generate the HTML for the number of arrows remaining
     * @return string HTML
     */
    public function presentArrows() {
        $a = $this->wumpus->numArrows();
        return "<p>You have $a arrows remaining.</p>";
    }
    /**
     * Generate the HTML for the status section of the page
     */
    public function presentStatus() {
        $room = $this->wumpus->getCurrent()->getNum();

        $html = <<<HTML
        
<h2 class="inroom">You are in room $room</h2>

HTML;

        if($this->wumpus->smellWumpus()) {
            $html .= '<p>You smell a wumpus!</p>';
        }
        else{
            $html .='<p>&nbsp;</p>';
        }
        if($this->wumpus->hearBirds()) {
            $html .= '<p>You hear birds!</p>';
        }
        else{
            $html .='<p>&nbsp;</p>';
        }
        if($this->wumpus->feelDraft()) {
            $html .= '<p>You  feel a draft!</p>';
        }
        else{
            $html .='<p>&nbsp;</p>';
        }
        if($this->wumpus->wasCarried()) {
            $html .= "<p> You were carried by the birds to room $room!</p >";
        }
        else{
            $html .= '<p>&nbsp;</p>';
        }




        return $html;
    }
    /**
     * Present the links for a room
     * @param int $ndx An index 0 to 2 for the three rooms
     * @return string HTML
     */
    public function presentRoom($ndx) {
        $room = $this->wumpus->getCurrent()->getNeighbors()[$ndx];
        $roomnum = $room->getNum();
        $roomndx = $room->getNdx();
        $roomurl = "game-post.php?m=$roomndx";
        $shooturl = "game-post.php?s=$roomndx";

        $html = <<<HTML
<div class="my_pic2">
  <figure><img src="cave2.jpg" width="180" height="135" alt=""/></figure>
  <p><a href="$roomurl">$roomnum</a></p>
<p><a href="$shooturl">Shoot Arrow</a></p>
</div>
HTML;

        return $html;
    }
}