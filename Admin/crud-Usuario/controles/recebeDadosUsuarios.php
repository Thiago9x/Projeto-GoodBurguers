<?php 
/*******************************************
    Objetivo: Arquivo responsável por receber dados, tratar os dados e validar os dados de clientes
    Data: 15/09/2021
    Autor: Marcel
********************************************/
//Import do arquivo de configuração de varaiveis e constantes
require_once('../functions/config.php');

//Import do arquivo para inserir no BD
require_once(SRCU.'bd/inserirUsuario.php');

require_once(SRCU.'bd/atualizarUsuario.php');

//Declaração de variaveis
$nome = (string) null;
$senha = (string) null;

if(isset($_GET['id']))
$id = (int) $_GET['id'];
else
$id = (int) 0;
//$_SERVER['REQUEST_METHOD'] - Verifica qual o tipo de requisição foi encaminhada pelo form (GET / POST)
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    //Recebe os dados encaminhado pelo Formulário através do metdo POST
    $nome = $_POST['txtNome'];
    $senha = $_POST['txtSenha'];
    $id=(int) $_GET['id'];
    
    //Validação de campos obrigatórios
    if ($nome == null || $senha == null)
        echo(ERRO_CAIXA_VAZIA);
    //Validação de qtde de caracteres
    //strlen() retorna a qtde de caracteres de uma varaivel
    else
    {
        //Local para enviar os dados para o Banco de Dados
        
        //Criação de um Array para encaminhar a função de inserir
        $arrayUsuarios = array (
            "nome"      => $nome,
            "senha"      => $senha,
            "id"        => $id
        );
        // chama a função inserir do arquivo inserirCliente.php 
        if(strtoupper($_GET['modo'])== 'SALVAR')
        {
        //Chama a função inserir do arquivo inserirCliente.php, e encaminha o array com os dados do cliente    
        if (inserir($arrayUsuarios))
            echo("
                <script>
                    alert('". BD_MSG_INSERIR ."');
                    window.location.href = '../dashboard.php';
                </script>
            ");
        else
            echo(BD_MSG_ERRO );
        }
        elseif(strtoupper($_GET['modo'])== 'ATUALIZAR'){
            if (editar($arrayUsuarios)){
                echo("
                <script>
                    alert('". BD_MSG_INSERIR ."');
                    window.location.href = '../dashboard.php';
                </script>
            ");
            }
            else
            {
                echo("
                <script>
                    alert('". BD_MSG_ERRO ."');
                    die;
                    window.history.back(); 
                </script>
            ");
            }
        }
    }
    
    
}

?>