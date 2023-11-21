<?php 

include_once('global.php');

// Criando instâncias de especialidades
$odontopediatria = new Especialidade('Odontopediatria');
$ortodontia = new Especialidade('Ortodontia');
$cirurgia = new Especialidade ('Cirurgia');
$clinicaMedica = new Especialidade ('Clinica Medica');

/*echo $ortodontia;
echo $cirurgia;*/

// Criando instâncias de procedimentos
$procedimento1 = new Procedimentos('Procedimento 1', 'Descrição do procedimento 1', 100.0, $odontopediatria);
$procedimento2 = new Procedimentos('Procedimento 2', 'Descrição do procedimento 2', 150.0, $ortodontia);
$procedimento3 = new Procedimentos('Procedimento 2', 'Descrição do procedimento 2', 150.0, $cirurgia);
$procedimento4 = new Procedimentos('Procedimento 2', 'Descrição do procedimento 2', 150.0, $clinicaMedica);

/*echo $procedimento1;
echo $procedimento2;
echo $procedimento3;*/

// Criando instâncias de pacientes
$paciente1 = new Paciente('Paciente 1', 'RG1', 'paciente1@example.com', '123456789', '01-01-1990');
$paciente2 = new Paciente('Paciente 2', 'RG2', 'paciente2@example.com', '987654321', '15-03-1985');

/*echo $paciente1;
echo $paciente2;*/

// Associando pacientes a clientes
$cliente1 = new Cliente('Cliente 1', 'RG1', 'cliente1@example.com', '987654321', 'CPF1');
$cliente2 = new Cliente('Cliente 2', 'RG2', 'cliente2@example.com', '123456789', 'CPF2');
$paciente1->AssociaCliente($cliente1);
$paciente2->AssociaCliente($cliente2);

//echo $cliente1;
//echo $cliente2;
//echo $paciente1;

// Criando instâncias de dentistas
$dentista1 = new DentistaParceiro('Dentista 1', 'Dentista RG1', 'dentista1@example.com', '111111111', 'CRO1', 'Endereço 1');
$dentista2 = new DentistaFuncionario('Dentista 2', 'Dentista RG2', 'dentista2@example.com', '222222222', 'CRO2', 'Endereço 2', 10000);
// $dentista3 = new DentistaParceiro('Dentista 3', 'Dentista RG3', 'dentista3@example.com', '33333333333', 'CRO3', 'Endereço 3');

// Adicionando especialidades aos dentistas
$dentista1->addEspecialidadesDentista($odontopediatria);
$dentista2->addEspecialidadesDentista($ortodontia);
$dentista2->addEspecialidadesDentista($cirurgia);
// $dentista3->addEspecialidadesDentista($clinicaMedica);

/*echo $dentista1;
echo $dentista2;*/

/*// Criando um orçamento associado a um paciente e um dentista
$orcamento = new Orcamento($paciente1, $dentista1, '2023-11-05');

// Adicionando procedimentos e detalhamentos ao orçamento
$orcamento->addProcedimento($procedimento1);
$orcamento->addDetalhamento('Detalhamento 1');
$orcamento->addDetalhamento('Detalhamento 2');

// Calculando o valor total do orçamento
$valorTotal = $orcamento->calculaOrcamento();
echo "Valor total do orçamento: $valorTotal\n";

// Criando um tratamento associado a um orçamento
$tratamento = new Tratamento($orcamento, 'Cartão de crédito a vista');

// Associando responsáveis ao tratamento
$tratamento->associaResponsavel($dentista1, $procedimento1);

// Marcar uma consulta no tratamento
$consulta = $tratamento->marcaConsulta('2023-11-15', '09:00', 60, $tratamento->execucao[0]);
echo "Consulta marcada para {$consulta->getDataC()} às {$consulta->getHorarioC()}\n";

// Finalizar um procedimento no tratamento
$dataConclusao = '2023-11-15';
$tratamento->finalizaProcedimento($tratamento->execucao[0], $dataConclusao);
echo "Procedimento finalizado em $dataConclusao\n";

// Calcular o pagamento para um dentista parceiro
$pagamento = $dentista2->CalcPagamento($tratamento->concluidos, $dentista2->habilitacoes);
echo "Pagamento para Dentista 2: $pagamento\n";

?>*/

// Criando uma consulta de avaliação
// $consultaAvaliacao = new ConsultaAvaliacao($paciente1, $dentista2, '10-11-2023', '10:00');

//echo $consultaAvaliacao;

// Criando um orçamento com base na consulta de avaliação
// $orcamento = $consultaAvaliacao->criaOrcamento();
// $orcamento->addProcedimento($procedimento1);
// $orcamento->addDetalhamento('Detalhamento 1');
// $orcamento->addProcedimento($procedimento2);
// $orcamento->addDetalhamento('Detalhamento 2');
// $orcamento->addProcedimento($procedimento3);
// $orcamento->addDetalhamento('Detalhamento 3');
// $orcamento->calculaOrcamento();
// $tratamento = $orcamento->analiseAprovacao(1,0);

//echo $orcamento;


//procedimento e dentista ok
//$responsavel1 = $tratamento->associaResponsavel($dentista2, $procedimento3);
//echo $responsavel1;
//procedimento e dentista NÃO ok
//$responsavel2 = $tratamento->associaResponsavel($dentista1, $procedimento2);


// $dataConsulta = "15-11-2023";
// $horarioConsulta = "10:00";
// $duracaoConsulta = 60;
// $consulta = $tratamento->marcaConsulta($dataConsulta, $horarioConsulta, $duracaoConsulta, $responsavel1);

// /*echo $tratamento;
// echo $consulta;*/

// $dataConclusao = "15-11-2023";
// $tratamento->finalizaProcedimento($responsavel1, $dataConclusao);

//echo $tratamento;


////////// Teste Usuario //////////
// $permissoes = array();
// $perfil1 = new Perfil($permissoes);
// $usuario1 = Usuario::criaUsuario("gustavolmf@gmail", "Gustavo", "12345", $perfil1);
// print_r($usuario1);


////////// Teste Contabilidade ////////////

//$metodoPagamento = new MetodoPagamento("PIX", 0);
$metodoPagamento1 = new MetodoPagamento("Cartao a vista", 0.5);
$pagamento1 = new Pagamento(230,"12-11-2023",$metodoPagamento);
$pagamento1->save();
$pagamento2 = new Pagamento(432,"24-11-2023",$metodoPagamento1);
$pagamento2->save();

$habilitacao = new Habilitacao($odontopediatria, 0.4);
$concluidos = new Concluidos($dentista1, $procedimento1, "13-11-2023");


$dentista1->addProcFeitos($concluidos);
$dentista1->addHabilitacao($habilitacao);
$dentista1->save();
//$dentista1->CalcPagamento($dentista1->getProcFeitos(), $dentista1->getHabilitacao());

$pagamentoOutubro = new PagamentoMes("10-2023");
$pagamentoOutubro->save();
$pagamentoNovembro = new PagamentoMes("11-2023");
$pagamentoNovembro->save();

$mesAno = "11-2023";
$testando = Pagamento::getRecordsbyField ("mesAno", $mesAno);
// print_r($testando);

$contabilidade = new Contabilidade("11-2023");
$receita = $contabilidade->calculaPagamento();
echo "Receita: $receita \n";
$despesas = $contabilidade->calculaDespesa();
echo "Despesas: $despesas \n";
$lucro = $contabilidade->calculaLucro();
echo "Lucro: $lucro \n";
// $lucroMes = $contabilidade->getLucro();

////////////////////////////////////////////////////////////////////////////////////////

// -------------------------------------- Roteiro de Testes --------------------------------------

// Criando Especialidades
$clinicaGeral = new Especialidade ("Clínica Geral");
$endodontia = new Especialidade("Endodontia");
$cirurgia = new Especialidade ("Cirurgia");
$estetica = new Especialidade("Estética");

// Criando Procedimentos
$limpeza = new Procedimentos("Limpeza", "", 200.0, $clinicaGeral);
$restauracao = new Procedimentos("Restauração", "", 185.0, $clinicaGeral);
$extracaoComum = new Procedimentos("Extração Comum", "Não inclui dente siso.", 280.0, $clinicaGeral);

$canal = new Procedimentos("Canal", "", 800.0, $endodontia);

$extracaoSiso = new Procedimentos("Extração de Siso", "Valor por dente.", 400.0, $cirurgia);

$clareamentoLaser = new Procedimentos("Clareamento a Laser", "", 1700.0, $estetica);
$clareamentoMoldeira = new Procedimentos("Clareamento de moldeira", "Clareamento caseiro.", 900.0, $estetica);

// echo $limpeza;
// echo $restauracao;
// echo $extracaoComum;
// echo $canal;
// echo $extracaoSiso;
// echo $clareamentoLaser;
// echo $clareamentoMoldeira;

// Teste Métodos de Pagamento
$aVista = new MetodoPagamento("Dinheiro à Vista", 0);
$pix = new MetodoPagamento("PIX", 0);
$debito = new MetodoPagamento("Débito", 0.03);
$credito1 = new MetodoPagamento("1x no Crédito", 0.04);
$credito2 = new MetodoPagamento("2x no Crédito", 0.04);
$credito3 = new MetodoPagamento("3x no Crédito", 0.04);
$credito4 = new MetodoPagamento("4x no Crédito", 0.07);
$credito5 = new MetodoPagamento("5x no Crédito", 0.07);
$credito6 = new MetodoPagamento("6x no Crédito", 0.07);

// echo $aVista;
// echo $pix;
// echo $debito;
// echo $credito1;
// echo $credito2;
// echo $credito3;
// echo $credito4;
// echo $credito5;
// echo $credito6;

// Criando Dentistas
$dentistaF = new DentistaFuncionario("Lucas", "36.176.562-9", "lucas@clinico.com", "(31) 99935-2324", "MG-95687", "Rua dos Angelins, nº 560", 5000.00);
$dentistaP = new DentistaParceiro("Marcos", "29.933.390-5", "marcos@clinico.com", "(31) 99104-6045", "MG-20541", "Praça Doutor Jésus Benigno, nº 412");

// Adicionando Especialidades aos Dentistas
$dentistaF->addEspecialidadesDentista($clinicaGeral);
$dentistaF->addEspecialidadesDentista($endodontia);
$dentistaF->addEspecialidadesDentista($cirurgia);
$dentistaP->addEspecialidadesDentista($clinicaGeral);
$dentistaP->addEspecialidadesDentista($estetica);

// Adicionando Percentual de Participação ao Dentista Parceiro
$habilitacao1 = new Habilitacao($clinicaGeral, 0.4);
$dentistaP->addHabilitacao($habilitacao1);
$habilitacao2 = new Habilitacao($estetica, 0.4);
$dentistaP->addHabilitacao($habilitacao2);

// echo $dentistaF;
// echo $dentistaP;

// Cadastro Paciente e Cliente
$paciente = new Paciente("Davi", "35.513.588-7", "davi@gmail.com", "(31) 99318-1787", "19-05-2001");
$cliente = new Cliente("Sara", "21.026.601-6", "sara@gmail.com", "(31) 98709-1653", "909.809.016-85");
$paciente->AssociaCliente($cliente);

// echo $paciente;
// echo $cliente;

// Criando Consulta de Avaliação
$consultaAvaliacao = new ConsultaAvaliacao($paciente, $dentistaP, "06-11-2023", "14:00");

// echo $consultaAvaliacao;

// Criando Orçamento
$orcamento = $consultaAvaliacao->criaOrcamento();
$orcamento->addProcedimento($limpeza);
$orcamento->addProcedimento($clareamentoLaser);
$orcamento->addProcedimento($restauracao);
$orcamento->addProcedimento($restauracao);
$tratamento = $orcamento->analiseAprovacao(2,0);
// echo $orcamento;
// echo $tratamento;

// $tratamento1 = $orcamento->analiseAprovacao(1,0);
// $tratamento2 = $orcamento->analiseAprovacao(2,5);
// $tratamento3 = $orcamento->analiseAprovacao(4,0);
// $tratamento4 = $orcamento->analiseAprovacao(4,1);
// $tratamento5 = $orcamento->analiseAprovacao(4,3);
// $tratamento6 = $orcamento->analiseAprovacao(4,7);
// $tratamento7 = $orcamento->analiseAprovacao(5,7);
// $tratamento8 = $orcamento->analiseAprovacao(4.3,4);

// echo $tratamento1;
// echo $tratamento2;
// echo $tratamento3;
// echo $tratamento4;
// echo $tratamento5;
// echo $tratamento6;
// echo $tratamento7;
// echo $tratamento8;
