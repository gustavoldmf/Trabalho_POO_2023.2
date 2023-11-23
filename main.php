<?php 

include_once('global.php');
include_once ('setup.php');

// Tentativa inicial de acessar uma funcionalidade sem que um login tenha sido realizado previamente. Como não há login, apareça a mensagem indicando que o usuário não está logado e, por não estar logado, aparecerá também que o usuário não tem permissão para executar esta ação. Para um caso de interface, poderia visualizar uma situação com 2 pop-ups de erro aparecendo um sobre o outro em seguida
$pacienteTeste =  Paciente::cadastraPaciente("Samuel", "23.494.298-8", "samuel@gmail.com", "(31) 99855-7846", "25-06-1998");

// Cadastro do Usuário com perfil adminTeste, que possui todas as funcionalidades menos a de criar um procedimento. Para se criar um procedimento, é necessário que haja uma especialidade, então ela também está sendo criada, o que mostra que outra função é permitida
$login1 = Login::Logar("mateus@gmail.com","mateus544");
// print_r ($login1);

$especialidadeTeste = Especialidade::criaEspecialidade ("Ortodontia");
$procedimentoTeste = Procedimentos::criaProcedimento("Aparelho Ortodôntico", "Instalação de um aparelho ortodôntico fixo ou móvel nos dentes", 350.0, $especialidadeTeste);

$login1->LogOut();

// Cadastro do Usuário com perfil admim, que possui acesso total ao sistema e às funcionalidades
$login2 = Login::Logar("joao@gmail.com","joao146");

// Criando Especialidades
$clinicaGeral = Especialidade::criaEspecialidade ("Clínica Geral");
$endodontia = Especialidade::criaEspecialidade ("Endodontia");
$cirurgia = Especialidade::criaEspecialidade  ("Cirurgia");
$estetica = Especialidade::criaEspecialidade ("Estética");

// Criando Procedimentos e associando conforme as Especialidades estabelecidas
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

// Criando Dentistas
$dentistaF = DentistaFuncionario::cadastraDentistaFuncionario("Lucas", "36.176.562-9", "lucas@clinico.com", "(31) 99935-2324", "MG-95687", "Rua dos Angelins, nº 560", 5000.00);
$dentistaP = DentistaParceiro::cadastraDentistaParceiro("Marcos", "29.933.390-5", "marcos@clinico.com", "(31) 99104-6045", "MG-20541", "Praça Doutor Jésus Benigno, nº 412");

// Adicionando as Especialidades estabelecidas aos Dentistas
$dentistaF->addEspecialidadesDentista($clinicaGeral);
$dentistaF->addEspecialidadesDentista($endodontia);
$dentistaF->addEspecialidadesDentista($cirurgia);
$dentistaP->addEspecialidadesDentista($clinicaGeral);
$dentistaP->addEspecialidadesDentista($estetica);

// Adicionando Percentual de Participação ao Dentista Parceiro. Passando através das especialidades e assim vai chegar em todos os procedimentos presentes em cada uma delas
$habilitacao1 = Habilitacao::criaHabilitacao($clinicaGeral, 0.4);
$habilitacao2 = Habilitacao::criaHabilitacao($estetica, 0.4);
$dentistaP->addHabilitacao($habilitacao1);
$dentistaP->addHabilitacao($habilitacao2);

// echo $dentistaF;
// echo $dentistaP;

// Cadastrando Paciente e Cliente e associando um com o outro
$paciente = Paciente::cadastraPaciente("Davi", "35.513.588-7", "davi@gmail.com", "(31) 99318-1787", "19-05-2001");
$cliente = Cliente::cadastraCliente("Sara", "21.026.601-6", "sara@gmail.com", "(31) 98709-1653", "909.809.016-85");
$paciente->AssociaCliente($cliente);

// echo $paciente;
// echo $cliente;

// Criando Consulta de Avaliação
$consultaAvaliacao = ConsultaAvaliacao::criaConsultaAvaliacao($paciente, $dentistaP, "06-11-2023", "14:00");

// echo $consultaAvaliacao;

// Após a consulta de avaliação, é criado o orçamento com os procedimentos selecionados e o valor total do orçamento é calculado
$orcamento = $consultaAvaliacao->criaOrcamento();
$orcamento->addProcedimento($limpeza);
$orcamento->addProcedimento($clareamentoLaser);
$orcamento->addProcedimento($restauracao);
$orcamento->addProcedimento($restauracao);
$orcamento->calculaOrcamento();

// echo $orcamento;

// A partir da aprovação do orçamento, o tratamento foi criado com o método de pagamento padrão estabelecido sendo o pix (conforme numerações e métodos estabelecidos no setup, o segundo valor é o número de parcelas, que só é levado em conta quando o método selecionado é crédito). Este método de pagamento é apenas um deixado como pré-definido, havendo a possibilidade de adicionar outras formas futuramente
$tratamento = $orcamento->analiseAprovacao(2,0);

// echo $tratamento;

// Associando os dentistas que serão responsáveis por cada procedimento
$responsavel1 = $tratamento->associaResponsavel($dentistaF, $limpeza);
$responsavel2 = $tratamento->associaResponsavel($dentistaP, $clareamentoLaser);
$responsavel3 = $tratamento->associaResponsavel($dentistaF, $restauracao);
$responsavel4 = $tratamento->associaResponsavel($dentistaP, $restauracao);

// echo $responsavel1;
// echo $responsavel2;
// echo $responsavel3;
// echo $responsavel4;

// Criando as consultas, uma para cada procedimento. O dentista e o procedimento relacionado a cada consulta estão sendo informados por meio do parâmetro 'responsável'
$consulta1 = $tratamento->marcaConsulta("10-11-2023", "09:00", "30 minutos", $responsavel1);
$consulta2 = $tratamento->marcaConsulta("15-11-2023", "15:00", "60 minutos", $responsavel2);
$consulta3 = $tratamento->marcaConsulta("24-11-2023", "10:30", "45 minutos", $responsavel3);
$consulta4 = $tratamento->marcaConsulta("27-11-2023", "14:00", "45 minutos", $responsavel4);

// echo $consulta1;
// echo $consulta2;
// echo $consulta3;
// echo $consulta4;

// Finalizando cada uma das consultas. Da mesma forma que o agendamento de cada consulta, para a finalização de cada procedimento o dentista e o procedimento relacionado a cada procedimento estão sendo informados por meio do parâmetro 'responsável'
$concluidos1 = $tratamento->finalizaProcedimento($responsavel1, "10-11-2023");
$concluidos2 = $tratamento->finalizaProcedimento($responsavel2, "15-11-2023");
$concluidos3 = $tratamento->finalizaProcedimento($responsavel3, "24-11-2023");
$concluidos4 = $tratamento->finalizaProcedimento($responsavel4, "27-11-2023");

// echo $concluidos1;
// echo $concluidos2;
// echo $concluidos3;
// echo $concluidos4;

// Os procedimentos finalizados são armazenados dentro dos parâmetros dos dentistas, para que assim o array de procedimentos a ser buscado no cálculo financeiro não fique vazio
$dentistaF->save();
$dentistaP->save();

// Iniciando a parte financeira, o valor total do orçamento é atribuído a uma variável para que assim sejam realizados os pagamentos conforme descritos. Cada pagamento realizado será armazenado em um array de pagamentos feitos
$valorTotal = $orcamento->calculaOrcamento();
// echo "Valor total do orçamento: R$ $valorTotal,00\n";
$pagamento1 = $tratamento->pagar($valorTotal/2,"10-11-2023",$pix);
$pagamento2 = $tratamento->pagar($valorTotal/2,"27-11-2023",$credito3);
$pagamento1->save();
$pagamento2->save();

// Iniciando o cálculo da receita, das despesas e do resultado final para o mês estabelecido (novembro)
$contabilidade = Contabilidade::iniciaContabilidade("$mesAno");
$receita = $contabilidade->calculaPagamento();
echo "Receita: R$ $receita \n";
$despesas = $contabilidade->calculaDespesa();
echo "Despesas: R$ $despesas \n";
$lucroMes = $contabilidade->calculaLucro();
echo "Resultado financeiro do mês $mes é: R$ $lucroMes \n";

$login2->LogOut();
Login::desligaSistema();