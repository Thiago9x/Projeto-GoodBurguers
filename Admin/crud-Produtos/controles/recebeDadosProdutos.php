<?php 
/*******************************************
    Objetivo: Arquivo responsável por receber dados, tratar os dados e validar os dados de clientes
    Data: 15/09/2021
    Autor: Marcel
********************************************/
//Import do arquivo de configuração de varaiveis e constantes
require_once('../functions/config.php');

//Import do arquivo para inserir no BD
require_once(SRC.'bd/inserirProduto.php');

// Import o arquivo que faz o upload de imagens para o servidor
require_once(SRC.'functions/upload.php');

require_once(SRC.'bd/atualizarProduto.php');


//Declaração de variaveis
$nome = (string) null;
$imagme = (string) null;
$valor = (string) null;
$destaque = (string) null;
$desconto = (string) null;
$descricao = (string) null;


//Validação para saber se o id do registro está chegando 
    // pela URL (modo para "Atualizar" um registro)
if (isset($_GET['id']))
    //Será utilizado somente para o editar
    $id = (int) $_GET['id'];
else
    $id = (int) 0;


//$_SERVER['REQUEST_METHOD'] - Verifica qual o tipo de requisição foi encaminhada pelo form (GET / POST)
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    //Recebe os dados encaminhado pelo Formulário através do metdo POST
    $nome = $_POST['txtNome'];
    $valor = $_POST['txtValor'];
    $destaque = $_POST['txtDestaque'];
    $desconto = $_POST['txtDesconto'];
    $descricao = $_POST['txtDescricao'];
    $id=(int) $_GET['id'];
    // esse nome esta chegando atraves do action do form da index, o motivo dessa variavel é para concluir o editar com o upload  de foto
    $nomeImagem = $_GET['nomeImagem'];

    if(strtoupper($_GET['modo']) == "ATUALIZAR"){
        if($_FILES['fleImagem']['name']!= ""){
            // chama a função que faz o upload de um arquivo 
            $imagem = uploadFile($_FILES['fleImagem']);
            // apaga a foto antiga 
            unlink(SRC.NOME_DIRETORIO_FILE. $nomeImagem);
        }
        else{
            $imagem = $nomeImagem;
        }
    }
    
    else{//Caso a variavel modo seja salvar então sera obrigatorio

    // chama a função que faz o upload de um arquivo 
    $imagem = uploadFile($_FILES['fleImagem']);
    // die;
    }
    //Validação de campos obrigatórios
    if ($nome == null || $valor == null || $descricao == null)
        echo(ERRO_CAIXA_VAZIA);
    //Validação de qtde de caracteres
    //strlen() retorna a qtde de caracteres de uma varaivel
    elseif (strlen($nome)>100 || strlen($valor)>15 || strlen($descricao)>500)
         echo( ERRO_MAXLENGHT);
    else
    {
        //Local para enviar os dados para o Banco de Dados
        
        //Criação de um Array para encaminhar a função de inserir
        $produto = array (
            "nome"          => $nome,
            "imagem"        => $imagem,
            "valor"         => $valor,
            "destaque"      => $destaque,
            "desconto"      => $desconto,
            "descricao"     => $descricao        
        );
        //validação para saber se é para inserir um novo registro
        // ou se é para atualizar um registro existente no BD
        if (strtoupper($_GET['modo']) == 'SALVAR')
        {
            //Chama a função inserir do arquivo inserirCliente.php, e encaminha o array com os dados do cliente    
            if (inserir($produto))
                echo("
                    <script>
                        alert('". BD_MSG_INSERIR ."');
                        window.location.href = '../dashboard.php';
                    </script>
                ");
            else
                echo("
                    <script>
                        alert('". BD_MSG_ERRO ."');
                        window.history.back(); 
                    </script>
                ");
                
        }elseif (strtoupper($_GET['modo']) == 'ATUALIZAR')
        {
            if (editar($produto))
                echo("
                    <script>
                        alert('". BD_MSG_INSERIR ."');
                        window.location.href = '../dashboard.php';
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