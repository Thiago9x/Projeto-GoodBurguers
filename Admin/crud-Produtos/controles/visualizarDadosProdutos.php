<?php 
/*******************************************************
    Objetivo: Arquivo responsável por buscar um registro para exibir na Modal do visualizar
    Data: 21/10/2021
    Autor: Marcel
*******************************************************/

function visualizarProdutos ($id)
{
    //Import do arquivo de configuração de varaiveis e constantes
    require_once('functions/config.php');

    //Import do arquivo para exluir no BD
    require_once(SRC.'bd/listarProdutos.php');
    
    //Recebe o id enviado como argumento na função
    $idProduto = $id;
    
    //Chama a função para buscar de id do cliente
    $dadosProduto = buscar($idProduto);
    
    //converte o resultado do BD em um array 
    //através mysqli_fetch_assoc 
    if($rsProduto=mysqli_fetch_assoc($dadosProduto))
         return $rsProduto;
    else
        return false;
    
}

?>