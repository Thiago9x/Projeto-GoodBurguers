<?php 
/*************************************************************************
    Objetivo: Excluir dados de Cliente no Banco de Dados
    Data: 29/09/2021
    Autor: Marcel
*************************************************************************/

//Import do arquivo de conexão com o BD
require_once('../bd/conexaoMysql.php');

function excluir($idCategoria)
{
<<<<<<< HEAD:Admin/crud-Categoria/bd/excluirCliente.php
    $sql = "delete from tblCategoria
                where idCategoria =". $idCategoria;
=======
    $sql = "delete from tblcliente
                where idcliente = ".$idCliente;
    
>>>>>>> 7542e95bdd640ea25f5731ddb4c92aaa4a762798:Admin/crud-Usuarios/bd/excluirCliente.php
    
    //Chamando a função que estabelçece a conexão com o BD 
    $conexao = conexaoMysql();
    
    if(mysqli_query($conexao, $sql))
        return true;
    else
        return false;
}

?>