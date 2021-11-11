<?php 
/*************************************************************************
    Objetivo: Excluir dados de Cliente no Banco de Dados
    Data: 29/09/2021
    Autor: Marcel
*************************************************************************/

//Import do arquivo de conexão com o BD
require_once(SRC.'/bd/conexaoMysql.php');

function excluir($idContato)
{
    $sql = "delete from tblContato
                where idContato =". $idContato;
    
    //Chamando a função que estabelçece a conexão com o BD 
    $conexao = conexaoMysql();
    
    if(mysqli_query($conexao, $sql))
        return true;
    else
        return false;
}

?>