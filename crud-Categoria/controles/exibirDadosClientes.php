<?php
/*******************************************
    Objetivo: Buscar ou Listar os dadps de Clientes, solicitando ao Banco de Dados 
    Data: 23/09/2021
    Autor: Thiago
********************************************/

require_once(SRC.'bd/listarcliente.php');

function exibirClientes(){
    //Chama a função que busca os dados no BD e recebe os registros de clientes
    $dados =  listar();
    
    return $dados;
}



?>