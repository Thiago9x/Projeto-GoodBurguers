<?php
/*************************************************************************
    Objetivo: Excluir dados de Cliente no Banco de Dados
    Data: 29/09/2021
    Autor: Thiago
*************************************************************************/
//Import do arquivo de conexão com o BD
require_once('../bd/conexaoMysql.php');

function excluir($idCliente)
{
    $sql = "delete from tblcliente
                where idclient =". $idCliente;
    

    //Chamando a função que estabelçece a conexão com o BD 
    $conexao = conexaoMysql();

    if(mysqli_query($conexao, $sql)){
        return true;
    }
    else{
        return false;
    }
}

?>