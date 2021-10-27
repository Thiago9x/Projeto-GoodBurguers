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
    $sql = "select * from tblcliente order by idclient desc";

    //abre a conexao com o bd
    $conexao = conexaoMysql();

    //solicita ao bd a execução do script sql
    $select = mysqli_query($conexao, $sql);
     
    return $select;
}
function buscar($idCliente){
    $sql = "select tblcliente.*,tblEstado.sigla 
        from tblcliente
            inner join tblEstado
            on tblEstado.idEstado = tblCliente.idEstado 
        where idclient =". $idCliente;

    //abre a conexao com o bd
    $conexao = conexaoMysql();

    //solicita ao bd a execução do script sql
    $select = mysqli_query($conexao, $sql);
     
    return $select;
}

?>