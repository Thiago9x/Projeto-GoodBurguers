<?php
/*************************************************************************
    Objetivo: Listar todos os dados do clientes do banco de dados
    Data: 23/09/2021
    Autor: Thiago
*************************************************************************/

//Import do arquivo de conexão com o BD
require_once(SRC.'bd/conexaoMysql.php');

function listarEstados()
{
    $sql = "select * from tblEstado order by nome";

    //abre a conexao com o bd
    $conexao = conexaoMysql();

    //solicita ao bd a execução do script sql
    $select = mysqli_query($conexao, $sql);
     
    return $select;
}

?>