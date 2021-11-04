<?php 
/*******************************************
    Objetivo: Buscar ou Listar os dados de Clientes, solictando ao Banco de Dados
    Data: 23/09/2021
    Autor: Marcel
********************************************/

//Import do arquivo para inserir no BD
require_once(SRC.'bd/listarClientes.php');

function exibirClientes ()
{
    //Chama a função que busca os dados no BD e recebe os registros de clientes
    $dados = listar();
    
    return $dados;
}
?>