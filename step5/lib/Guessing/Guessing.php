<?php
/**
 * Created by PhpStorm.
 * User: Chang Ge
 * Date: 5/30/2018
 * Time: 12:20 AM
 */

namespace Guessing;


class Guessing
{
    const MIN = 1;
    const MAX = 100;

    public function __construct($seed = null) {
        if($seed === null) {
            $seed = time();
        }

        srand($seed);
        $this->number = rand(self::MIN, self::MAX);
    }
    public function getNumber(){
        return $this->number;
    }
    public function getNumGuesses(){
        return $this->guess_times;
    }
    public function getGuess(){
        return $this->number_guess;
    }
    public function check(){
        return $this->check_it;
    }
    public function guess($g){
        if($g<=100 and $g>=1)
        {
        $this->number_guess=$g;
        $this->check_it=1;
        $this->guess_times+=1;
        if($this->number_guess>$this->number){
            $this->check_it=self::TOOHIGH;
        }
        if($this->number_guess<$this->number){
            $this->check_it=self::TOOLOW;
        }
        if($this->number_guess==$this->number){
            $this->check_it=self::CORRECT;
        }
        }
        else{
            $this->number_guess=$g;
            $this->check_it=0;
        }

    }
    const CORRECT=3;
    const TOOHIGH=2;
    const TOOLOW=1;
    const INVALID=0;
    private $number;
    private $number_guess=0;
    private $check_it=1;
    private $guess_times=0;
}