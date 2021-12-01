<?php 
/*******************************************
    Objetivo: Arquivo responsável por receber o id do 
    Cliente e encaminhar para a função que irá buscar 
    os dados
    Data: 06/10/2021
    Autor: Marcel
********************************************/
    
    //Import do arquivo de configuração de varaiveis e constantes
    require_once('../functions/config.php');

    //Import do arquivo para exluir no BD
    require_once(SRC.'bd/listarProduto.php');

    //O id esta sendo encaminhado pela index, no link que foi realizado na imagem do excluir
    $idProduto = $_GET['id'];
    
    //Chama a função para buscar de id do cliente
    $dadosProduto = buscar($idProduto);
    
    //converte o resultado do BD em um array 
    //através mysqli_fetch_assoc 
    if($rsProduto=mysqli_fetch_assoc($dadosProduto))
    {
        //Ativa a utilização de variaveis de sessão 
        //(são varaivels) globais
        session_start();
        
        //Criamos uma variavel de sessão para guardar o array
        //com os dados do cliente que retornou do BD
        $_SESSION['produto'] = $rsProduto;
        
        //Permite chamar um arquivo como se fosse um link,
        //através do php
        header('location:../index.php');
    }
    else
        echo("
                <script>
                    alert('". BD_MSG_ERRO ."');
                    window.history.back(); 
                </script>
            ");




?>