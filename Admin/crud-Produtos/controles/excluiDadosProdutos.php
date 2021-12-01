<?php 
/*******************************************
    Objetivo: Arquivo responsável por receber o id do Cliente e
    encaminhar para a função que irá excluir o dado
    Data: 29/09/2021
    Autor: Marcel
********************************************/
    
    //Import do arquivo de configuração de varaiveis e constantes
    require_once('../functions/config.php');

    //Import do arquivo para exluir no BD
    require_once(SRC.'bd/excluirProduto.php');

    //O id esta sendo encaminhado pela index, no link que foi realizado na imagem do excluir
    $idProduto = $_GET['id'];
    // o nome da fot foi enviado pela index no link do excluir 
    $nomeImagem = $_GET['imagem'];
    //Chama a função excluir e encaminha o ID que será removido do BD
    if(excluir($idProduto)){
        // Apaga a foto que ta na pasta dos arquivos do upload 
        unlink (SRC.NOME_DIRETORIO_FILE. $nomeImagem);
        echo(BD_MSG_EXCLUIR);
    }
    else
        echo("
                <script>
                    alert('". BD_MSG_ERRO ."');
                    window.history.back(); 
                </script>
            ");




?>