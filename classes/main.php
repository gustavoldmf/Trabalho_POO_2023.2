    <?php 

include_once('../global.php');

$Dentista1 = new Dentista("Letícia", 19153123, "leticiaarrumadente@orkut.br", 993929434, 303050);
$Cliente1 = new Cliente("Pai", 12352423, "melhorpai@orkut.br", 996959121, 16045125444);
$Paciente1 = new Paciente("Mathiew", 21234230, "Mathiewgameplays@orkut.br", 996958284, 02122004);
$Paciente1->AssociaCliente($Cliente1);

//ProcedimentoPadrao
$Procedimento1 = new Procedimentos("Limpeza", "Limpeza de todos os dentes", 129.90);
$Procedimento2 = new Procedimentos("Manutenção do aparelho", "Troca de peças e ajustres necessarios", 169.90);

$Orcamento_Mathiew = new Orcamento($Paciente1, $Dentista1, 29022023);
$Orcamento_Mathiew->addProcedimento($Procedimento1);
$Orcamento_Mathiew->addProcedimento($Procedimento2);

$resultado = $Orcamento_Mathiew-> calculaOrcamento();

echo $resultado;

//Testanto mudança de cliente Pai para cliente Mae
$Paciente1->exibeInfo();
$aux = ($Paciente1->getClienteAssociado())->getnome();
print("Cliente responsável: " .$aux ."\n\n");


$Paciente1->AssociaCliente("Mae");






