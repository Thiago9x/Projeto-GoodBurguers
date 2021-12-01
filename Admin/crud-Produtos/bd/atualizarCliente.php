<?php 
/*************************************************************************
    Objetivo: Atualizar dados de um Cliente existente no Banco de Dados
    Data: 13/10/2021
    Autor: Marcel
*************************************************************************/

//Import do arquivo de conexão com o BD
require_once('../bd/conexaoMysql.php');

function editar ($arrayCliente)
{
    $sql = "update tblcliente set 
                nome = '".$arrayCliente['nome']."',
                rg = '".$arrayCliente['rg']."',
                cpf = '".$arrayCliente['cpf']."',
                telefone = '".$arrayCliente['telefone']."',
                celular = '".$arrayCliente['celular']."',
                email = '".$arrayCliente['email']."',
                obs = '".$arrayCliente['obs']."',
                idEstado = ".$arrayCliente['idEstado'].",
                foto = '".$arrayCliente['foto']."'
            where idcliente = ".$arrayCliente['id'];
    
        //Chamando a função que estabelece a conexão com o BD 
        $conexao = conexaoMysql();
        //Envia o script SQL para o BD
        if (mysqli_query($conexao, $sql))
            return true; //Retorna verdadeiro se o registro for inserido no BD
        else
            return false; //Retorna falso se houver algum problema
            
}


?>