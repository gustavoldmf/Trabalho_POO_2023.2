<?php

include_once('global.php');

// Criando Usuários
$teste = array("isso", "aquilo");
$perfil = new Perfil ($teste);
$usuario1 = new Usuario ("mateus@hotmail.com", "Mateus", "mateus544", $perfil);
$usuario2 = new Usuario ("joao@gmail.com", "João", "joao146", $perfil);
$usuario1->save();
$usuario2->save();

// Criando os Métodos de Pagamento Disponíveis
$aVista = new MetodoPagamento("Dinheiro à Vista", 0);
$pix = new MetodoPagamento("PIX", 0);
$debito = new MetodoPagamento("Débito", 0.03);
$credito1 = new MetodoPagamento("1x no Crédito", 0.04);
$credito2 = new MetodoPagamento("2x no Crédito", 0.04);
$credito3 = new MetodoPagamento("3x no Crédito", 0.04);
$credito4 = new MetodoPagamento("4x no Crédito", 0.07);
$credito5 = new MetodoPagamento("5x no Crédito", 0.07);
$credito6 = new MetodoPagamento("6x no Crédito", 0.07);
$aVista->save();
$pix->save();
$debito->save();
$credito1->save();
$credito2->save();
$credito3->save();
$credito4->save();
$credito5->save();
$credito6->save();
