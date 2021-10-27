<?php 
/*******************************************
    Objetivo: Arquivo responsável por receber dados, tratar os dados e validar os dados de clientes
    Data: 15/09/2021
    Autor: Marcel
********************************************/
//Import do arquivo de configuração de varaiveis e constantes
require_once('../functions/config.php');

//Import do arquivo para inserir no BD
require_once(SRC.'bd/inserirCliente.php');

require_once(SRC.'bd/atualizarCliente.php');

//Declaração de variaveis
$nome = (string) null;
$rg = (string) null;
$cpf = (string) null;
$telefone = (string) null;
$celular = (string) null;
$email = (string) null;
$obs = (string) null;
$idEstado = (int) null;

if(isset($_GET['id']))
$id = (int) $_GET['id'];
else
$id = (int) 0;
//$_SERVER['REQUEST_METHOD'] - Verifica qual o tipo de requisição foi encaminhada pelo form (GET / POST)
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    //Recebe os dados encaminhado pelo Formulário através do metdo POST
    $nome = $_POST['txtNome'];
    $rg = $_POST['txtRg'];
    $cpf = $_POST['txtCpf'];
    $telefone = $_POST['txtTelefone'];
    $celular = $_POST['txtCelular'];
    $email = $_POST['txtEmail'];
    $obs = $_POST['txtObs'];
    $idEstado = $_POST['sltEstado'];
    $id=(int) $_GET['id'];
    
    //Validação de campos obrigatórios
    if ($nome == null || $rg == null || $cpf == null)
        echo("<script> 
                alert('". ERRO_CAIXA_VAZIA ."'); 
                window.history.back();    
            </script>");
    //Validação de qtde de caracteres
    //strlen() retorna a qtde de caracteres de uma varaivel
    elseif (strlen($nome)>100 || strlen($rg)>15 || strlen($cpf)>20)
         echo("<script> 
                alert('". ERRO_MAXLENGHT ."'); 
                window.history.back();    
            </script>");
    else
    {
        //Local para enviar os dados para o Banco de Dados
        
        //Criação de um Array para encaminhar a função de inserir
        $cliente = array (
            "nome"      => $nome,
            "rg"        => $rg,
            "cpf"       => $cpf,
            "telefone"  => $telefone,
            "celular"   => $celular,
            "email"     => $email,
            "obs"       => $obs,
            "id"        =>$id,
            "idEstado"        =>$idEstado
        );
        // chama a função inserir do arquivo inserirCliente.php 
        if(strtoupper($_GET['modo'])== 'SALVAR')
        {
        //Chama a função inserir do arquivo inserirCliente.php, e encaminha o array com os dados do cliente    
        if (inserir($cliente))
            echo("
                <script>
                    alert('". BD_MSG_INSERIR ."');
                    window.location.href = '../index.php';
                </script>
            ");
        else
            echo(BD_MSG_ERRO );
        }
        elseif(strtoupper($_GET['modo'])== 'ATUALIZAR'){
            if (editar($cliente)){
                echo("
                <script>
                    alert('". BD_MSG_INSERIR ."');
                    window.location.href = '../index.php';
                </script>
            ");
            }
            else
            {
                echo( BD_MSG_ERRO);
            }
        }
    }
    
    
}

?>