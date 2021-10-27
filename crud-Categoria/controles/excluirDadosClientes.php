<?php
/*******************************************
    Objetivo: arquivo reponsavel por receber o id do Cliente e encaminhar para a funç~]ao que ira excluir o dado do cliente
    Data: 29/09/2021
    Autor: Thiago
********************************************/

    
    //Import do arquivo de configuração de varaiveis e constantes
    require_once('../functions/config.php');

    //Import do arquivo para inserir no BD
    require_once(SRC.'bd/excluirCliente.php');

    // o id esta sendo encaminhado pela index, no link que foi realizado na iimagem do excluir
    $idCliente = $_GET["id"];

    //Chama a função excluir e encaminha o ID que será removido do BD
    excluir($idCliente);

    if(excluir($idCliente))
    {
        echo(BD_MSG_EXCLUIR);
    }
    else
    {
        echo("
                <script>
                    alert('". BD_MSG_ERRO ."');
                    window.history.back(); 
                </script>
            ");
    }
?>