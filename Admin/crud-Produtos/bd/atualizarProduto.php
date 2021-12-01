<?php 
/*************************************************************************
    Objetivo: Atualizar dados de um Cliente existente no Banco de Dados
    Data: 13/10/2021
    Autor: Marcel
*************************************************************************/

//Import do arquivo de conexão com o BD
require_once('../bd/conexaoMysql.php');

function editar ($arrayProduto)
{
    $sql = "update tblProdutos set 
                nome = '".$arrayProduto['nome']."',
                valor = '".$arrayProduto['valor']."',
                destaque = '".$arrayProduto['destaque']."',
                desconto = '".$arrayProduto['desconto']."',
                descricao = '".$arrayProduto['descricao']."',
                imagem = '".$arrayProduto['imagem']."'
            where idProdutos = ".$arrayProduto['id'];
    
        //Chamando a função que estabelece a conexão com o BD 
        $conexao = conexaoMysql();
        //Envia o script SQL para o BD
        if (mysqli_query($conexao, $sql))
            return true; //Retorna verdadeiro se o registro for inserido no BD
        else
            return false; //Retorna falso se houver algum problema
            
}


?>