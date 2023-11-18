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
$paciente1 = new Paciente('Paciente 1', 'RG1', 'paciente1@example.com', '123456789', '1990-01-01');
$paciente2 = new Paciente('Paciente 2', 'RG2', 'paciente2@example.com', '987654321', '1985-03-15');

/*echo $paciente1;
echo $paciente2;*/

// Associando pacientes a clientes
$cliente1 = new Cliente('Cliente 1', 'RG1', 'cliente1@example.com', '987654321', 'CPF1');
$cliente2 = new Cliente('Cliente 2', 'RG2', 'cliente2@example.com', '123456789', 'CPF2');
$paciente1->AssociaCliente($cliente1);
$paciente2->AssociaCliente($cliente2);

echo $cliente1;
echo $cliente2;
echo $paciente1;

// Criando instâncias de dentistas
$dentista1 = new DentistaParceiro('Dentista 1', 'Dentista RG1', 'dentista1@example.com', '111111111', 'CRO1', 'Endereço 1');
$dentista2 = new DentistaFuncionario('Dentista 2', 'Dentista RG2', 'dentista2@example.com', '222222222', 'CRO2', 'Endereço 2', 10000);
$dentista3 = new DentistaParceiro('Dentista 3', 'Dentista RG3', 'dentista3@example.com', '33333333333', 'CRO3', 'Endereço 3');

// Adicionando especialidades aos dentistas
$dentista1->addEspecialidadesDentista($odontopediatria);
$dentista2->addEspecialidadesDentista($ortodontia);
$dentista2->addEspecialidadesDentista($cirurgia);
$dentista3->addEspecialidadesDentista($clinicaMedica);

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
$consultaAvaliacao = new ConsultaAvaliacao($paciente1, $dentista2, '2023-11-10', '10:00');

//echo $consultaAvaliacao;

// Criando um orçamento com base na consulta de avaliação
$orcamento = $consultaAvaliacao->criaOrcamento();
$orcamento->addProcedimento($procedimento1);
$orcamento->addDetalhamento('Detalhamento 1');
$orcamento->addProcedimento($procedimento2);
$orcamento->addDetalhamento('Detalhamento 2');
$orcamento->addProcedimento($procedimento3);
$orcamento->addDetalhamento('Detalhamento 3');
$orcamento->calculaOrcamento();
$tratamento = $orcamento->analiseAprovacao(1,0);

//echo $orcamento;


//procedimento e dentista ok
$responsavel1 = $tratamento->associaResponsavel($dentista2, $procedimento3);
echo $responsavel1;
//procedimento e dentista NÃO ok
$responsavel2 = $tratamento->associaResponsavel($dentista1, $procedimento2);


$dataConsulta = "2023-11-15";
$horarioConsulta = "10:00";
$duracaoConsulta = 60;
$consulta = $tratamento->marcaConsulta($dataConsulta, $horarioConsulta, $duracaoConsulta, $responsavel1);

/*echo $tratamento;
echo $consulta;*/

$dataConclusao = "2023-11-15";
$tratamento->finalizaProcedimento($responsavel1, $dataConclusao);

//echo $tratamento;
