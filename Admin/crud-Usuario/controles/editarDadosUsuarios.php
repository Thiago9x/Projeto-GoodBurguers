<?php
/*******************************************
    Objetivo: arquivo reponsavel por receber o id do Cliente e encaminhar para a funç~]ao que ira excluir o dado do cliente
    Data: 06/09/2021
    Autor: Thiago
********************************************/

    
    //Import do arquivo de configuração de varaiveis e constantes
    require_once('../functions/config.php');

    //Import do arquivo para inserir no BD
    require_once(SRCU.'bd/listarUsuario.php');

    // o id esta sendo encaminhado pela index, no link que foi realizado na imagem do excluir
    $idUsuario = $_GET["id"];

    //Chama a função excluir e encaminha o ID que será removido do BD
    $dadosUsuario = buscar($idUsuario);

    if($rsUsuario = mysqli_fetch_assoc($dadosUsuario))
    {
        session_start();
        $_SESSION['Usuario'] = $rsUsuario;
        header("location:../dashboard.php");
    }
    else
    
        echo("
                <script>
                    alert('". BD_MSG_ERRO ."');
                    window.history.back(); 
                </script>
            ");
    
?>