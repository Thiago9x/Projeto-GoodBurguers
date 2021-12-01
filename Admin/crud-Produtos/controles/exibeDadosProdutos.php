<?php 
/*******************************************
    Objetivo: Buscar ou Listar os dados de Clientes, solictando ao Banco de Dados
    Data: 23/09/2021
    Autor: Marcel
********************************************/

//Import do arquivo para inserir no BD
require_once(SRC.'bd/listarProduto.php');

function exibirProduto (){
    //Chama a função que busca os dados no BD e recebe os registros de clientes
    $dados = listar();
    
    return $dados;
}
// Função para criar um arrayde dados com base no retorno do BD
function criarArray($objeto){
    $cont = (int) 0 ;
    // Estrutura de repetição para pegar uma objeto de dados e converter em um array 
    while($rsDados = mysqli_fetch_assoc($objeto)){
        $arrayDados[$cont] =  array(
            "id"        =>  $rsDados['idProdutos'],
            "nome"      =>  $rsDados['nome'],
            "imagem"        =>  $rsDados['imagem'],
            "valor"       =>  $rsDados['valor'],
            "destaque"  =>  $rsDados['destaque'],
            "desconto"     =>  $rsDados['desconto'],
            "descricao"   =>  $rsDados['descricao'],
        );
        $cont ++;
    }
    // Tratamento para validar se existe daos no BD, se não houver retorno devera ser falso
    if(isset($arrayDados)){
        return $arrayDados;
    }
    else{
        return false;
    }
}
// Função para gerar um Json em base de um array de dados 
function criarJson($arrayDados){
    // Especifica o cabeçalho do php que será gerado um json 
    header("content-type:application/json");

    // converte um array em json 
    $listJSON = json_encode ($arrayDados);

    // json_encode converte um array em formato json 
    // json_decode converte um JSON em formato array 
    if(isset($listJSON)){
        return $listJSON;
    }
    else{
        return false;
    }
}
// Função para buscar dados do banco de dados
function buscarProdutos ($id){
    //Chama a função que busca os dados no BD e recebe os registros de clientes
    $dados = buscar($id);
    
    return $dados;
}
?>