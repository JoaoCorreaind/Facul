<?php

class Mortadela extends RecheioDecorator
{
    private $pao;
    public function __construct(Pao $pao)
    {
        $this->pao = $pao;
    }

    public function getNome()
    {
        return $this->pao->getNome(). ", Mortadela";
    }

    public function valor()
    {
        return 1 + $this->pao->valor();
    }
}