<?php
/*************************************************************************
    Objetivo: atualizar dados do BD
    Data: 13/10/2021
    Autor: Thiago
*************************************************************************/
//Import do arquivo de conexão com o BD
require_once(SRC.'bd/conexaoMysql.php');
function editar($arrayUsuario)
{
    // throw new Exception();
    $sql = "update tblUsuario set
                    nome =' ". $arrayUsuario['nome']."',
                    senha =' ". $arrayUsuario['senha']."',
                where idUsuario = ".$arrayUsuario['id'];

        // var_dump($arrayCategoria);   
            // echo $sql;
            // var_dump($arrayCliente);
            //Chamando a função que estabelece a conexão com o BD 
        $conexao = conexaoMysql();
        //Envia o script SQL para o BD
        if (mysqli_query($conexao, $sql))
            return true; //Retorna verdadeiro se o registro for inserido no BD
        else
            return false; //Retorna falso se houver algum problema
                
}





?>