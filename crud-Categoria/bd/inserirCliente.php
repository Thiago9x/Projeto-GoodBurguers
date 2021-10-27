<?php 
/*************************************************************************
    Objetivo: Inserir dados de Cliente no Banco de Dados
    Data: 16/09/2021
    Autor: Marcel
*************************************************************************/

//Import do arquivo de conexão com o BD
require_once('../bd/conexaoMysql.php');

function inserir ($arrayCliente)
{
    $sql = "insert into tblcliente
                (
                    nome,
                    IdEstado,
                    rg,
                    cpf,
                    telefone,
                    celular,
                    email,
                    obs
                )
                values
                (
                    '". $arrayCliente['nome'] ."',
                    '". $arrayCliente[idEstado] ."',
                    '". $arrayCliente['rg'] ."',
                    '". $arrayCliente['cpf'] ."',
                    '". $arrayCliente['telefone'] ."',
                    '". $arrayCliente['celular'] ."',
                    '". $arrayCliente['email'] ."',
                    '". $arrayCliente['obs'] ."'
                )
            ";

        //Chamando a função que estabelçece a conexão com o BD 
        $conexao = conexaoMysql();
        //Envia o script SQL para o BD
        if (mysqli_query($conexao, $sql))
            return true; //Retorna verdadeiro se o registro for inserido no BD
        else
            return false; //Retorna falso se houver algum problema
}













?>