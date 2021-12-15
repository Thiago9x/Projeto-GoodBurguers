<?php 
/*************************************************************************
    Objetivo: Excluir dados de Cliente no Banco de Dados
    Data: 29/09/2021
    Autor: Marcel
*************************************************************************/

//Import do arquivo de conexão com o BD
require_once(SRCU.'/bd/conexaoMysql.php');

function excluir($idUsuario)
{
    $sql = "delete from tblUsuario
                where idUsuario =". $idUsuario;
    
    //Chamando a função que estabelçece a conexão com o BD 
    $conexao = conexaoMysql();
    
    if(mysqli_query($conexao, $sql))
        return true;
    else
        return false;
}

?>