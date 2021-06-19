<?php
require_once 'Pao/Pao.php';
require_once 'Pao/Baguete.php';
require_once 'Pao/Frances.php';
require_once 'Pao/Velho.php';
require_once 'Recheio/RecheioDecorator.php';
require_once 'Recheio/Mortadela.php';
require_once 'Recheio/Carne.php';
require_once 'Recheio/Queijo.php';

$velho = new Velho();
$velho = new Carne($velho);
echo $velho->getNome(). " R$ " . $velho->valor() . "\n";

$Baguete = new Baguete();
$Baguete = new Mortadela($Baguete);
echo $Baguete->getNome(). " R$ " . $Baguete->valor()  . "\n";

$frances = new Frances();
$frances = new Carne($frances);
echo $frances->getNome(). " R$ " . $frances->valor()  . "\n";

$velho = new Velho();
echo $velho->getNome(). " R$ " . $velho->valor() . "\n";

$Baguete = new Baguete();
echo $Baguete->getNome(). " R$ " . $Baguete->valor()  . "\n";

$frances = new Frances();
echo $frances->getNome(). " R$ " . $frances->valor()  . "\n";


