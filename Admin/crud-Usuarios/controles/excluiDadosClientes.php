<?php 
/*******************************************
    Objetivo: Arquivo responsável por receber o id do Cliente e
    encaminhar para a função que irá excluir o dado
    Data: 29/09/2021
    Autor: Marcel
********************************************/
    
    //Import do arquivo de configuração de varaiveis e constantes
    require_once('../functions/config.php');

    //Import do arquivo para exluir no BD
    require_once(SRC.'bd/excluirCliente.php');

<<<<<<< HEAD:Admin/crud-Categoria/controles/excluirDadosClientes.php
    // o id esta sendo encaminhado pela index, no link que foi realizado na iimagem do excluir
    $idCategoria = $_GET["id"];

    //Chama a função excluir e encaminha o ID que será removido do BD
    excluir($idCategoria);

    if(excluir($idCategoria))
    {
=======
    //O id esta sendo encaminhado pela index, no link que foi realizado na imagem do excluir
    $idCliente = $_GET['id'];

    //Chama a função excluir e encaminha o ID que será removido do BD
    if(excluir($idCliente))
>>>>>>> 7542e95bdd640ea25f5731ddb4c92aaa4a762798:Admin/crud-Usuarios/controles/excluiDadosClientes.php
        echo(BD_MSG_EXCLUIR);
    else
        echo("
                <script>
                    alert('". BD_MSG_ERRO ."');
                    window.history.back(); 
                </script>
            ");




?>