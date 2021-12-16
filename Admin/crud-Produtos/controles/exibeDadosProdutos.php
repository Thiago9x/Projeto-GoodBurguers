<?php 
/*******************************************
    Objetivo: Buscar ou Listar os dados de Clientes, solictando ao Banco de Dados
    Data: 23/09/2021
    Autor: Marcel
********************************************/

require_once(SRC.'bd/listarProduto.php');

function exibirCategoriasProdutos(){
    //Chama a função que busca os dados no BD e recebe os registros de clientes
    $dados =  listar();
    
    return $dados;
}
function buscarProdutos2($id)
    {
        $dados = buscar($id);

        return $dados;
    }

// Função para buscar dados do banco de Dados com filtro pelo nome (API)
function buscarNomeProdutos($nome)
{
    $dados = buscarNome($nome);

    return $dados;
}
function buscarIdCategoria($idCategoria)
{
    $dados = buscarId($idCategoria);

    return $dados;
}

function criarArrayProdutos($objeto)
{
    $cont = (int) 0;

    while($rsDados = mysqli_fetch_assoc($objeto))
    {
        $arrayDados[$cont] = array(
        "id"           => $rsDados['idProdutos'],
        "nome"         => $rsDados['nome'],
        "valor"        => $rsDados['valor'],
        "desconto"     => $rsDados['desconto'],
        "descricao"    => $rsDados['descricao'],
        "destaque"    => $rsDados['destaque'],
        "idCategoria" => $rsDados['idCategoria'],
        "imagem"       => $rsDados['imagem']
    );
        $cont+=1;
    }
    if(isset($arrayDados))
        return $arrayDados;
    else
        return false;
}

function criarJSONProdutos($arrayDados)
        {

            header("content-type:application/json");

            $listJSON = json_encode($arrayDados);

            if(isset($listJSON))
                return $listJSON;
            else
            return false;
        }

?>
