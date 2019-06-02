<?php
/**
 * Created by PhpStorm.
 * User: Chang Ge
 * Date: 5/30/2018
 * Time: 11:45 PM
 */

namespace Guessing;


class GuessingController
{

    public function __construct(Guessing $guessing,$p)
    {
        $this->game=$guessing;
        if(isset($p['clear'])) {
            $this->reset = true;
        }
        elseif(isset($p['value'])){
            $this->game->guess(strip_tags($p['value']));
        }

    }
    public function isReset(){
        return $this->reset;
    }




    private $reset=false;
    private $game;
}