<?php 
/*******************************************
    Objetivo: Arquivo responsável por receber dados, tratar os dados e validar os dados de clientes
    Data: 15/09/2021
    Autor: Marcel
********************************************/
//Import do arquivo de configuração de varaiveis e constantes
require_once('../functions/config.php');

//Import do arquivo para inserir no BD
require_once(SRC.'bd/inserirCategoria.php');

require_once(SRC.'bd/atualizarCategoria.php');

//Declaração de variaveis
$nome = (string) null;

if(isset($_GET['id']))
$id = (int) $_GET['id'];
else
$id = (int) 0;
//$_SERVER['REQUEST_METHOD'] - Verifica qual o tipo de requisição foi encaminhada pelo form (GET / POST)
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    //Recebe os dados encaminhado pelo Formulário através do metdo POST
    $nome = $_POST['txtNome'];
    $id=(int) $_GET['id'];
    
    //Validação de campos obrigatórios
    if ($nome == null)
        echo(ERRO_CAIXA_VAZIA);
    //Validação de qtde de caracteres
    //strlen() retorna a qtde de caracteres de uma varaivel
    elseif (strlen($nome)>100)
         echo(ERRO_MAXLENGHT);
    else
    {
        //Local para enviar os dados para o Banco de Dados
        
        //Criação de um Array para encaminhar a função de inserir
        $arrayCategoria = array (
            "nome"      => $nome,
            "id"        => $id
        );
        // chama a função inserir do arquivo inserirCliente.php 
        if(strtoupper($_GET['modo'])== 'SALVAR')
        {
        //Chama a função inserir do arquivo inserirCliente.php, e encaminha o array com os dados do cliente    
        if (inserir($arrayCategoria))
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
            if (editar($arrayCategoria)){
                echo("
                <script>
                    alert('". BD_MSG_INSERIR ."');
                    window.location.href = '../dashboard.php';
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