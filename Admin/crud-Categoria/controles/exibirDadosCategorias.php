<?php
/*******************************************
    Objetivo: Buscar ou Listar os dadps de Clientes, solicitando ao Banco de Dados 
    Data: 23/09/2021
    Autor: Thiago
********************************************/

require_once(SRC.'bd/listarCategoria.php');

function exibirCategorias(){
    //Chama a função que busca os dados no BD e recebe os registros de clientes
    $dados =  listarCategorias();
    
    return $dados;
}


function buscarCategoria($id)
    {
        $dados = buscar($id);

        return $dados;
    }


function criarArrayCategorias($objeto)
{
    $cont = (int) 0;

    while($rsDados = mysqli_fetch_assoc($objeto))
    {
        $arrayDados[$cont] = array(
        "id"           => $rsDados['idCategoria'],
        "nome"         => $rsDados['nome'],
    );
        $cont+=1;
    }
    if(isset($arrayDados))
        return $arrayDados;
    else
        return false;
}

function criarJSONCategorias($arrayDados)
        {

            header("content-type:application/json");

            $listJSON = json_encode($arrayDados);

            if(isset($listJSON))
                return $listJSON;
            else
            return false;
        }

?>