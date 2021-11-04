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
    require_once(SRC.'bd/listarClientes.php');

    //O id esta sendo encaminhado pela index, no link que foi realizado na imagem do excluir
    $idCliente = $_GET['id'];
    
    //Chama a função para buscar de id do cliente
    $dadosCliente = buscar($idCliente);
    
    //converte o resultado do BD em um array 
    //através mysqli_fetch_assoc 
    if($rsCliente=mysqli_fetch_assoc($dadosCliente))
    {
        //Ativa a utilização de variaveis de sessão 
        //(são varaivels) globais
        session_start();
        
        //Criamos uma variavel de sessão para guardar o array
        //com os dados do cliente que retornou do BD
        $_SESSION['cliente'] = $rsCliente;
        
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