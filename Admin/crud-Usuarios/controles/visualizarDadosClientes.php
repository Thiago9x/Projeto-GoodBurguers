<?php 
/*******************************************************
    Objetivo: Arquivo responsável por buscar um registro para exibir na Modal do visualizar
    Data: 21/10/2021
    Autor: Marcel
*******************************************************/

function visualizarCliente ($id)
{
    //Import do arquivo de configuração de varaiveis e constantes
    require_once('functions/config.php');

    //Import do arquivo para exluir no BD
    require_once(SRC.'bd/listarClientes.php');
    
    //Recebe o id enviado como argumento na função
    $idCliente = $id;
    
    //Chama a função para buscar de id do cliente
    $dadosCliente = buscar($idCliente);
    
    //converte o resultado do BD em um array 
    //através mysqli_fetch_assoc 
    if($rsCliente=mysqli_fetch_assoc($dadosCliente))
         return $rsCliente;
    else
        return false;
    
}

?>