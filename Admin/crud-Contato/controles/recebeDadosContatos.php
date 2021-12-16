<?php 
/*******************************************
    Objetivo: Arquivo responsável por receber dados, tratar os dados e validar os dados de clientes
    Data: 15/09/2021
    Autor: Marcel
********************************************/
//Import do arquivo de configuração de varaiveis e constantes
require_once('../functions/config.php');

//Import do arquivo para inserir no BD
require_once(SRC.'bd/inserirContato.php');

require_once(SRC.'bd/atualizarContato.php');



//Declaração de variaveis
$email = (string) null;
$nome = (string) null;
$telefone = (string) null;


if(isset($_GET['id']))
$id = (int) $_GET['id'];
else
$id = (int) 0;
//$_SERVER['REQUEST_METHOD'] - Verifica qual o tipo de requisição foi encaminhada pelo form (GET / POST)
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    //Recebe os dados encaminhado pelo Formulário através do metdo POST
    $nome = $_POST['txtNome'];
    $email = $_POST['txtEmail'];
    $telefone = $_POST['txtTelefone'];
    
    //Validação de campos obrigatórios
    if ($email == null|| $nome == null || $telefone == null)
        echo("<script> 
                alert('". ERRO_CAIXA_VAZIA ."'); 
                window.history.back();    
            </script>");
    //Validação de qtde de caracteres
    //strlen() retorna a qtde de caracteres de uma varaivel
    elseif (strlen($email)>100)
         echo("<script> 
                alert('". ERRO_MAXLENGHT ."'); 
                window.history.back();    
            </script>");
    else
    {
        //Local para enviar os dados para o Banco de Dados
        
        //Criação de um Array para encaminhar a função de inserir
        $arrayContato = array (
            "email"     => $email,
            "nome"      => $nome,
            "telefone"  => $telefone,
            "id"        => $id
        );
  
        // chama a função inserir do arquivo inserirCliente.php 
        if(strtoupper($_GET['modo'])== 'SALVAR')
        {
        //Chama a função inserir do arquivo inserirCliente.php, e encaminha o array com os dados do cliente    
        if (inserir($arrayContato))
            echo("
                <script>
                    alert('". BD_MSG_INSERIR ."');
                    window.history.back();
                </script>
            ");
        else
        echo("
        <script>
            alert('". BD_MSG_ERRO ."');
            window.history.back();
        </script>
    ");
        }
    }
    
    
}

?>