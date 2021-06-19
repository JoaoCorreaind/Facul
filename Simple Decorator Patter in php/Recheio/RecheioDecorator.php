<?php

abstract class RecheioDecorator extends Pao
{
    protected $nome;

    public function getNome()
    {
        return $this->nome;
    }
}