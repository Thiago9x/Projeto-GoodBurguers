<?php 
/*************************************************************************
    Objetivo: Listar todos os dados de Estados do Banco de Dados
    Data: 27/10/2021
    Autor: Marcel
*************************************************************************/
//Import do arquivo de conexão com o BD
require_once(SRC.'bd/conexaoMysql.php');

//retorna todos os registros existentes no banco
function listarEstados ()
{
    $sql = "select * from tblEstado order by nome";
    
    //Abre a conexão com o BD
    $conexao = conexaoMysql();
    
    //Solicita aoBD a execução do script SQL
    $select = mysqli_query($conexao, $sql);
    
    return $select;
    
}

?>