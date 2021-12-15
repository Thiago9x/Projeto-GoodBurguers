<?php
    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;
    
    //Import para o start do slim php.
    require_once("vendor/autoload.php");
    
    $config = [
        'settings' => [
            'displayErrorDetails' => true # change this <------
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

    $app->get('/produtos/{id}', function($request, $response, $args){
    
        $id = $args['id'];
    
        if($listDados = buscarProdutos2($id))
            if($listDadosArray = criarArray($listDados))
                $listDadosJSON = criarJSON($listDadosArray);

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
            if($listDadosArray = criarArray($listDados))
                $listDadosJSON = criarJSON($listDadosArray);

        }else
        {
        
        if($listDados = exibirProdutos())
            if($listDadosArray = criarArray($listDados))
                $listDadosJSON = criarJSON($listDadosArray);
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
    
?>