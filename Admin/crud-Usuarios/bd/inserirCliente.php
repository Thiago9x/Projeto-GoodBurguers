<?php 
/*************************************************************************
    Objetivo: Inserir dados de Cliente no Banco de Dados
    Data: 16/09/2021
    Autor: Marcel
*************************************************************************/

//Import do arquivo de conexão com o BD
require_once('../bd/conexaoMysql.php');

function inserir ($arrayCategoria)
{
    $sql = "insert into tblCategoria
                (
<<<<<<< HEAD:Admin/crud-Categoria/bd/inserirCliente.php
                    nome
                )
                values
                (
                    '". $arrayCategoria['nome'] ."'
=======
                    nome,
                    rg,
                    cpf,
                    telefone,
                    celular,
                    email,
                    obs,
                    foto,
                    idEstado
                )
                values
                (
                    '". $arrayCliente['nome'] ."',
                    '". $arrayCliente['rg'] ."',
                    '". $arrayCliente['cpf'] ."',
                    '". $arrayCliente['telefone'] ."',
                    '". $arrayCliente['celular'] ."',
                    '". $arrayCliente['email'] ."',
                    '". $arrayCliente['obs'] ."',
                    '". $arrayCliente['foto'] ."',
                    ". $arrayCliente['idEstado'] ."
>>>>>>> 7542e95bdd640ea25f5731ddb4c92aaa4a762798:Admin/crud-Usuarios/bd/inserirCliente.php
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