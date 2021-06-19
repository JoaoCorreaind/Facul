<?php

class Velho extends Pao
{
    public function __construct()
    {
         $this->nome = "Velho";
    }
    public function valor()
    {
        return 0.25;
    }
}