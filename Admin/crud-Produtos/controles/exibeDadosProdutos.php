<?php 
/*******************************************
    Objetivo: Buscar ou Listar os dados de Clientes, solictando ao Banco de Dados
    Data: 23/09/2021
    Autor: Marcel
********************************************/

require_once(SRC.'bd/listarProduto.php');

function exibirCategoriasProdutos(){
    //Chama a função que busca os dados no BD e recebe os registros de clientes
    $dados =  listar();
    
    return $dados;
}
?>