<?php
/*************************************************************************
    Objetivo: atualizar dados do BD
    Data: 13/10/2021
    Autor: Thiago
*************************************************************************/
//Import do arquivo de conexão com o BD
require_once('../bd/conexaoMysql.php');
function editar(array $cliente)
{
    $sql = "update tblcliente set
                    nome =' ".$cliente['nome']."',
                    idEstado =".$cliente[idEstado].",
                    rg = '". $cliente['rg'] ."',
                    cpf = '". $cliente['cpf'] ."',
                    telefone = '". $cliente['telefone'] ."',
                    celular = '". $cliente['celular'] ."',
                    email = '". $cliente['email'] ."',
                    obs = '". $cliente['obs'] ."'
                    
                    
            where idclient = ".$cliente['id'];


            echo $sql;
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