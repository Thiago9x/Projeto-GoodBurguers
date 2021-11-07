<?php 
/*************************************************************************
    Objetivo: Arquivo para configurar a conexão com o Banco de Dados MySQL 
    Data: 15/09/2021
    Autor: Marcel
*************************************************************************/

//Abre a conexão com a base de dados MySQL
function conexaoMysql()
{
 
    
    //Declaração de Variaveis para conexão com BD
    $server = (string) BD_SERVER;
    $user = (string) BD_USER;
    $password = (string) BD_PASSWORD;
    $database = (string) BD_DATABASE;
    
    
    /*
        Formas de criar a conexão com BD
        
            mysql_connect();
            mysqli_connect();
            PDO();
    */
    
    if($conexao = mysqli_connect($server, $user, $password, $database))
        return $conexao;
    else
    {
        echo(ERRO_CONEXAO_BD);
        return false;
    }
    
}

?>