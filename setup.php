<?php

include_once('global.php');

// Criando usuário admin com um array que contém todos as funcionalidades
$admin = array("criaProcedimento", "criaOrcamento", "calculaPagamento", "calculaDespesa", "calculaLucro", "addEspecialidadeDentista", "addProcFeitos", "addHabilitacao", "calcPagamento", "addProcedimento","addDetalhamento", "associaResponsavel", "DesassociaCliente", "exibeInfo", "associaResponsavel", "marcaConsulta", "finalizaProcedimento", "criaUsuario","verificaPermissao", "addEspecialidadesDentista","AssociaCliente", "cadastraPaciente", "criaEspecialidade","cadastraDentistaFuncionario", "cadastraDentistaParceiro", "cadastraDentista", "criaHabilitacao", "cadastraCliente", "criaConsultaAvaliacao", "iniciaContabilidade", "pagar");

// Criando usuário adminTeste com um array que contém todos as funcionalidades, exceto a criaProcedimento, para realizar o teste segundo o roteiro
$adminTeste = array("criaOrcamento", "calculaPagamento", "calculaDespesa", "calculaLucro", "addEspecialidadeDentista","addProcFeitos", "addHabilitacao", "calcPagamento", "addProcedimento", "addDetalhamento", "associaResponsavel", "DesassociaCliente", "exibeInfo", "associaResponsavel", "marcaConsulta", "finalizaProcedimento", "criaUsuario","verificaPermissao", "addEspecialidadesDentista","AssociaCliente", "cadastraPaciente", "criaEspecialidade","cadastraDentistaFuncionario", "cadastraDentistaParceiro", "cadastraDentista", "criaHabilitacao", "cadastraCliente", "criaConsultaAvaliacao", "iniciaContabilidade", "pagar");

$perfilAdmin = new Perfil ($admin);
$perfilAdminTeste = new Perfil ($adminTeste);

// O primeiro usuário será o que não tem permissão para criar procedimentos e o segundo,
$usuario1 = new Usuario ("mateus@gmail.com", "Mateus", "mateus544", $perfilAdminTeste);
$usuario2 = new Usuario ("joao@gmail.com", "João", "joao146", $perfilAdmin);
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

// Instanciando o Pagamento do Mês de Novembro
$mesAno = "11-2023";
$pagamentoNovembro = new PagamentoMes($mesAno);
$pagamentoNovembro->save();

$parte = explode("-", $mesAno);
$mes = $parte[0];