<?php
/*******************************************
    Objetivo: Listar os dados de Estados no Banco de Dados
    Data: 27/10/2021
    Autor: Marcel
********************************************/

//Import do arquivo para inserir no BD
require_once(SRC.'bd/listarEstados.php');

function exibirEstados ()
{
    //Chama a função que busca os dados no BD e recebe os registros de clientes
    $dados = listarEstados();
    
    return $dados;
}

?>