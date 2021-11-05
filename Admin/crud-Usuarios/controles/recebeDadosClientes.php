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

// Import o arquivo que faz o upload de imagens para o servidor
require_once(SRC.'functions/upload.php');

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
//variavel criada para guardar o nome da foto
$foto=(String) null;

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
    $rg = $_POST['txtRg'];
    $cpf = $_POST['txtCpf'];
    $telefone = $_POST['txtTelefone'];
    $celular = $_POST['txtCelular'];
    $email = $_POST['txtEmail'];
    $obs = $_POST['txtObs'];
    $idEstado = $_POST['sltEstado'];
    $id=(int) $_GET['id'];

    // chama a função que faz o upload de um arquivo 
    echo($foto);
    $foto = uploadFile($_FILES['fleFoto']);
    // die;

    //Validação de campos obrigatórios
    if ($nome == null || $rg == null || $cpf == null)
        echo(ERRO_CAIXA_VAZIA);
    //Validação de qtde de caracteres
    //strlen() retorna a qtde de caracteres de uma varaivel
    elseif (strlen($nome)>100 || strlen($rg)>15 || strlen($cpf)>20)
         echo( ERRO_MAXLENGHT);
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
            "id"        => $id,
            "foto"      =>$foto,
            "idEstado"  => $idEstado
        
        );
        //validação para saber se é para inserir um novo registro
        // ou se é para atualizar um registro existente no BD
        if (strtoupper($_GET['modo']) == 'SALVAR')
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
                echo("
                    <script>
                        alert('". BD_MSG_ERRO ."');
                        window.history.back(); 
                    </script>
                ");
        }elseif (strtoupper($_GET['modo']) == 'ATUALIZAR')
        {
            if (editar($cliente))
                echo("
                    <script>
                        alert('". BD_MSG_INSERIR ."');
                        window.location.href = '../index.php';
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