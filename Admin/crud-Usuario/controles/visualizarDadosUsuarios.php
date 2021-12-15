<?php
/*******************************************
    Objetivo: Arquivo responsavel por buscar um registro para exibir na Modal do visualizar
    Data: 21/10/2021
    Autor: Thiago
********************************************/ 

function visualizarUsuario($id) {
    //Import do arquivo de configuração de varaiveis e constantes
    require_once('functions/config.php');

    //Import do arquivo para inserir no BD
    require_once(SRCU.'bd/listarUsuario.php');

    // o id esta sendo encaminhado pela index, no link que foi realizado na iimagem do excluir
    $idUsuario = $id;

    //Chama a função excluir e encaminha o ID que será removido do BD
    $dadosUsuarios = buscar($idUsuario);

    if($rsUsuarios = mysqli_fetch_assoc($dadosUsuarios))
    {
        return $rsUsuarios;
    }
    else{
        return false;
    }
}


?>

