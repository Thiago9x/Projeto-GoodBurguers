<?php
    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;
    
    //Import para o start do slim php.
    require_once("vendor/autoload.php");
    
    $config = [
        'settings' => [

    'determineRouteBeforeAppMiddleware' => true,
    'displayErrorDetails' => true,
    'addContentLengthHeader' => false
        ],
    ];

    //Instancia da classe Slim\App, é realizada para termos acesso aos métodos da classe.
    $app = new \Slim\App($config);

    require_once("../crud-Produtos/functions/config.php");
    

    //Chamando no banco pela queryString
    //http://localhost/ds2t20212/samuel/ProjectHamburgueria2/produtos?nome=Cheddar

    require_once('../crud-Produtos/controles/exibeDadosProdutos.php');

    // Instancia da classe Slim\App, é realizada para que possamos ter acesso aos metodos da classe
    // $app = new \Slim\App();
    //busca por idcategoria
    $app->get('/produtos/{idCategoria}', function($request, $response, $args){
    
        $idCategoria = $args['idCategoria'];
    
        if($listDados = buscarIdCategoria($idCategoria))
            if($listDadosArray = criarArrayProdutos($listDados))
                $listDadosJSON = criarJSONProdutos($listDadosArray);

        if($listDadosArray)
        {
             return $response    ->withStatus(200)  
                                 ->withHeader('Content-Type', 'application/json')
                                 ->write($listDadosJSON);                                               
        }else
        {
             return $response    ->withStatus(204);
                                                                        
        }                        
    });

    // Endpoint: GET, retorna um cliente pelo ID
    $app->get('/produtos', function($request, $response, $args){
       
        if(isset($request->getQueryParams()['nome']))
        {
            
            $nome = (string) null;

            $nome = $request->getQueryParams()['nome'];
            
            if($listDados = buscarNomeProdutos($nome))
            if($listDadosArray = criarArrayProdutos($listDados))
                $listDadosJSON = criarJSONProdutos($listDadosArray);

        }else
        {
        
        if($listDados = exibirCategoriasProdutos())
            if($listDadosArray = criarArrayProdutos($listDados))
                $listDadosJSON = criarJSONProdutos($listDadosArray);
            } 

        if($listDadosArray)
        {
             return $response    ->withStatus(200)  
                                 ->withHeader('Content-Type', 'application/json')
                                 ->write($listDadosJSON);                                               
        }else
        {
            return $response    ->withStatus(200)  
            ->withHeader('Content-Type', 'application/json')
            ->write('{"message":"não ha dados para essa requisição"}');                                                                   
        }                        
    });
    // Carrega todos os EndPoint para a execução
    $app->run();
    