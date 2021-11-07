<?php
/*******************************************
    Objetivo: Arquivo responsavel por buscar um registro para exibir na Modal do visualizar
    Data: 21/10/2021
    Autor: Thiago
********************************************/ 

function visualizarCategoria($id) {
    //Import do arquivo de configuração de varaiveis e constantes
    require_once('functions/config.php');

    //Import do arquivo para inserir no BD
    require_once(SRC.'bd/listarCategoria.php');

    // o id esta sendo encaminhado pela index, no link que foi realizado na iimagem do excluir
    $idCategoria = $id;

    //Chama a função excluir e encaminha o ID que será removido do BD
    $dadosCategoria = buscar($idCategoria);

    if($rsCategoria = mysqli_fetch_assoc($dadosCategoria))
    {
        return $rsCategoria;
    }
    else{
        return false;
    }
}


?>

