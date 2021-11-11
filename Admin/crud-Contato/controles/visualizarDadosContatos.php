<?php
/*******************************************
    Objetivo: Arquivo responsavel por buscar um registro para exibir na Modal do visualizar
    Data: 21/10/2021
    Autor: Thiago
********************************************/ 

function visualizarContato($id) {
    //Import do arquivo de configuração de varaiveis e constantes
    require_once('functions/config.php');

    //Import do arquivo para inserir no BD
    require_once(SRC.'bd/listarContato.php');

    // o id esta sendo encaminhado pela index, no link que foi realizado na iimagem do excluir
    $idContato = $id;

    //Chama a função excluir e encaminha o ID que será removido do BD
    $dadosContato = buscar($idContato);

    if($rsContato = mysqli_fetch_assoc($dadosContato))
    {
        return $rsContato;
    }
    else{
        return false;
    }
}


?>

