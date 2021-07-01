<?php

class Queijo extends RecheioDecorator
{
    private $pao;
    public function __construct(Pao $pao)
    {
        $this->pao = $pao;
    }

    public function getNome()
    {
        return $this->pao->getNome(). ", Queijo";
    }

    public function valor()
    {
        return 0.75 + $this->pao->valor();
    }
}