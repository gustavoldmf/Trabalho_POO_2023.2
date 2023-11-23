<?php 

include_once('global.php');
include_once ('setup.php');

// Tentativa inicial de acessar uma funcionalidade sem que um login tenha sido realizado previamente
$pacienteTeste =  Paciente::cadastraPaciente("Samuel", "23.494.298-8", "samuel@gmail.com", "(31) 99855-7846", "25-06-1998");
echo $pacienteTeste;

// Cadastro do Usuário com perfil adminTeste, que possui todas as funcionalidades menos a de criar um procedimento. Para se criar um procedimento, é necessário que haja uma especialidade, então ela também está sendo criada, o que mostra que outra função é permitida.
Login::Logar("mateus@gmail.com","mateus544");
$login1 = Login::getRecordsbyField("logado", 1);
// print_r ($login1);

$especialidadeTeste = Especialidade::criaEspecialidade ("Ortodontia");
//$procedimentoTeste = Procedimentos::criaProcedimento("Limpeza", "", 200.0, $especialidadeTeste);

$login1 = $login1[0];
$login1->LogOut();

// Cadastro do Usuário com Acesso Total
Login::Logar("joao@gmail.com","joao146");
$login2 = Login::getRecordsbyField("logado", 0);


// Criando Especialidades / mudar pra cadastroEspecialidade
$clinicaGeral = Especialidade::criaEspecialidade ("Clínica Geral");
$endodontia = Especialidade::criaEspecialidade ("Endodontia");
$cirurgia = Especialidade::criaEspecialidade  ("Cirurgia");
$estetica = Especialidade::criaEspecialidade ("Estética");


// Criando Procedimentos / mudar pra cadastroProcedimento
$limpeza = Procedimentos::criaProcedimento("Limpeza", "", 200.0, $clinicaGeral);
$restauracao = Procedimentos::criaProcedimento("Restauração", "", 185.0, $clinicaGeral);
$extracaoComum = Procedimentos::criaProcedimento("Extração Comum", "Não inclui dente siso.", 280.0, $clinicaGeral);

$canal = Procedimentos::criaProcedimento("Canal", "", 800.0, $endodontia);

$extracaoSiso = Procedimentos::criaProcedimento("Extração de Siso", "Valor por dente.", 400.0, $cirurgia);

$clareamentoLaser = Procedimentos::criaProcedimento("Clareamento a Laser", "", 1700.0, $estetica);
$clareamentoMoldeira = Procedimentos::criaProcedimento("Clareamento de moldeira", "Clareamento caseiro.", 900.0, $estetica);

// echo $limpeza;
// echo $restauracao;
// echo $extracaoComum;
// echo $canal;
// echo $extracaoSiso;
// echo $clareamentoLaser;
// echo $clareamentoMoldeira;

// Criando Dentistas / save???
$dentistaF = DentistaFuncionario::cadastraDentistaFuncionario("Lucas", "36.176.562-9", "lucas@clinico.com", "(31) 99935-2324", "MG-95687", "Rua dos Angelins, nº 560", 5000.00);
$dentistaP = DentistaParceiro::cadastraDentistaParceiro("Marcos", "29.933.390-5", "marcos@clinico.com", "(31) 99104-6045", "MG-20541", "Praça Doutor Jésus Benigno, nº 412");

// Adicionando Especialidades aos Dentistas / save???
$dentistaF->addEspecialidadesDentista($clinicaGeral);
$dentistaF->addEspecialidadesDentista($endodontia);
$dentistaF->addEspecialidadesDentista($cirurgia);
$dentistaP->addEspecialidadesDentista($clinicaGeral);
$dentistaP->addEspecialidadesDentista($estetica);

// Adicionando Percentual de Participação ao Dentista Parceiro / mudar pra criaHabilitacao
$habilitacao1 = Habilitacao::criaHabilitacao($clinicaGeral, 0.4);
$habilitacao2 = Habilitacao::criaHabilitacao($estetica, 0.4);
$dentistaP->addHabilitacao($habilitacao1);
$dentistaP->addHabilitacao($habilitacao2);


// echo $dentistaF;
// echo $dentistaP;

// Cadastro Paciente e Cliente / save??? / mudar pra criaPaciente e criaCliente
$paciente = Paciente::cadastraPaciente("Davi", "35.513.588-7", "davi@gmail.com", "(31) 99318-1787", "19-05-2001");
$cliente = Cliente::cadastraCliente("Sara", "21.026.601-6", "sara@gmail.com", "(31) 98709-1653", "909.809.016-85");
$paciente->AssociaCliente($cliente);

// echo $paciente;
// echo $cliente;

// Criando Consulta de Avaliação / save??? / mudar pra criaConsultaAvaliacao
$consultaAvaliacao = ConsultaAvaliacao::criaConsultaAvaliacao($paciente, $dentistaP, "06-11-2023", "14:00");

// echo $consultaAvaliacao;

// Criando Orçamento e Aprovação / CRIAR DETALHAMENTO DE VERDADE / save???
$orcamento = $consultaAvaliacao->criaOrcamento();
$orcamento->addProcedimento($limpeza);
$orcamento->addProcedimento($clareamentoLaser);
$orcamento->addProcedimento($restauracao);
$orcamento->addProcedimento($restauracao);
$orcamento->calculaOrcamento();

// Orçamento aprovado, então tratamento foi criado
$tratamento = $orcamento->analiseAprovacao(2,0);

// echo $orcamento;
// echo $tratamento;

// Associando Dentista ao Procedimento ok / save???
$responsavel1 = $tratamento->associaResponsavel($dentistaF, $limpeza);
$responsavel2 = $tratamento->associaResponsavel($dentistaP, $clareamentoLaser);
$responsavel3 = $tratamento->associaResponsavel($dentistaF, $restauracao);
$responsavel4 = $tratamento->associaResponsavel($dentistaP, $restauracao);

// echo $responsavel1;
// echo $responsavel2;
// echo $responsavel3;
// echo $responsavel4;

// Criando Consultas / save???
$consulta1 = $tratamento->marcaConsulta("10-11-2023", "09:00", "30 minutos", $responsavel1);
$consulta2 = $tratamento->marcaConsulta("15-11-2023", "15:00", "60 minutos", $responsavel2);
$consulta3 = $tratamento->marcaConsulta("24-11-2023", "10:30", "45 minutos", $responsavel3);
$consulta4 = $tratamento->marcaConsulta("27-11-2023", "14:00", "45 minutos", $responsavel4);

// echo $consulta1;
// echo $consulta2;
// echo $consulta3;
// echo $consulta4;

$concluidos1 = $tratamento->finalizaProcedimento($responsavel1, "10-11-2023");
$concluidos2 = $tratamento->finalizaProcedimento($responsavel2, "15-11-2023");
$concluidos3 = $tratamento->finalizaProcedimento($responsavel3, "24-11-2023");
$concluidos4 = $tratamento->finalizaProcedimento($responsavel4, "27-11-2023");

// echo $concluidos1;
// echo $concluidos2;
// echo $concluidos3;
// echo $concluidos4;

// CONTABILIDADE A FAZER
$valorTotal = $orcamento->calculaOrcamento();
// echo "Valor total do orçamento: R$ $valorTotal,00\n";

$pagamento1 = $tratamento->pagar($valorTotal/2,"10-11-2023",$pix);
$pagamento2 = $tratamento->pagar($valorTotal/2,"27-11-2023",$credito3);
$pagamento1->save();
$pagamento2->save();

$dentistaF->save();
$dentistaP->save();

// mudar pra criaContabilidade
$contabilidade = Contabilidade::iniciaContabilidade("11-2023");
$receita = $contabilidade->calculaPagamento();
echo "Receita: R$ $receita \n";
$despesas = $contabilidade->calculaDespesa();
echo "Despesas: R$ $despesas \n";
$lucroMes = $contabilidade->calculaLucro();
echo "Lucro do mês $mes: R$ $lucroMes \n";
