<?php
/*************************************************************************
    Objetivo: Listar todos os dados do clientes do banco de dados
    Data: 23/09/2021
    Autor: Thiago
*************************************************************************/

//Import do arquivo de conexão com o BD
require_once(SRC.'bd/conexaoMysql.php');

function listar()
{
    $sql = "select * from tblCategoria";

    //abre a conexao com o bd
    $conexao = conexaoMysql();

    //solicita ao bd a execução do script sql
    $select = mysqli_query($conexao, $sql);
     
    return $select;
}
function buscar($idCategoria){
    $sql = "select * 
        from tblCategoria 
        where idCategoria =". $idCategoria;

    //abre a conexao com o bd
    $conexao = conexaoMysql();

    //solicita ao bd a execução do script sql
    $select = mysqli_query($conexao, $sql);
     
    return $select;
}

?>