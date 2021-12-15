<?php 

    /* Permite executar a API em outras linguagens/android etc, são permissões e configurações para a API responder em um servidor real */
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS*');
    header('Access-Control-Allow-Header: Content-Type');
    header('Content-Type: application/json');

    // Import do arquivo de configuração do sistema
    require_once("../crudProdutos/functionsProducts/config.php");

    $url = (string) null;

    // Cria um array com bae na url até a pasta API, guarda no indice 0 a 1° Palavra após a "/"
    $url = explode('/', $_GET['url']);

    // Se tiver a palavra 'clientes' ou 'estados' redireciona conforme a escolha.
    switch($url[0])
    {
        case 'produtos':
            // Import do arquivo de API de clientes 
            require_once('produtosAPI/index.php');
            break;
        case 'categorias':
            require_once('categoriasAPI/index.php');
            break;
    }

    
    