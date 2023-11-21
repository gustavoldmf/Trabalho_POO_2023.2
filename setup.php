<?php

include_once('global.php');

$metodoPagamento = new MetodoPagamento("PIX", 0);
$teste = array("isso", "aquilo");
$perfil = new Perfil ($teste);

$usuario1 = new Usuario ("teste@hotmail.com", "Matheus", "matheus123", $perfil);
$usuario2 = new Usuario ("teste@gmail.com", "Matheus", "matheus123", $perfil);
$usuario1->save();
$usuario2->save();