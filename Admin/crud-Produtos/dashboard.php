<?php
    //Ativa a utilização de variaveis de sessão
    session_start();

    //Declaração das variaveis para o formulário
    $nome = (string) null;
    $imagem = (string) null;
    $valor = (string) null;
    $destaque = (string) null;
    $desconto = (string) null;
    $descricao = (string) null;
    $id = (int) 0;

    //Essa variavel será utilizada para definir
    //o modo de manipulação com o banco de dados
    //(Salvar = será feito o insert
    // Atualizar = será feito o update)    
    $modo = (string) "Salvar";


    //import do arquivo de configuração de variaveis e constantes
    require_once('functions/config.php');

    require_once(SRC.'bd/conexaoMysql.php');
    conexaoMysql();

    require_once(SRC.'controles/exibeDadosProdutos.php');

    //Verifica a existencia da variavel de sessão
    //que usamos para trazer os dados para o editar
    if(isset($_SESSION['produto']))
    {
        
        $id = $_SESSION['produto']['idProdutos'];
        $nome = $_SESSION['produto']['nome'];
        $imagem = $_SESSION['produto']['imagem'];
        $valor = $_SESSION['produto']['valor'];
        $destaque = $_SESSION['produto']['destaque'];
        $desconto = $_SESSION['produto']['desconto'];
        $descricao = $_SESSION['produto']['descricao'];
        $modo = "Atualizar";
        
        //Elimina um objeto, variavel da memória
        unset($_SESSION['produto']);
        
    }
        

   

?>

<!DOCTYPE>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title> Cadastro </title>
        <link rel="stylesheet" type="text/css" href="style/style.css">
        <link rel="stylesheet" type="text/css" href="style/style2.css">
        <script src="js/jquery.js"></script>
        
        <script>
            $(document).ready(function(){
                //Alterando uma propriedade de css ao carregar da página
                $('#containerModal').css('display', 'none');
                
                //Abre a modal
                $('.pesquisar').click(function(){
                    $('#containerModal').slideToggle(1000);
                    
                    //Recebe o id do Cliente que foi adicionado pelo 
                    //data atributo no HTML
                    let idProduto = $(this).data('id');
                    
                    //Realiza uma requisição para consumir 
                    //dados de uma outra página
                });
                
                //Fechar a modal
                $('#fecharModal').click(function(){
                   $('#containerModal').fadeOut(); 
                });
            });
        </script>
        
        
    </head>
    <body>
    
        <div id="containerModal">
            <span id="fecharModal"> 
                <img src="img/trash.png" alt="Excluir" title="Excluir" class="excluir">
            </span>
            <div id="modal">
            
            </div>
        </div>
        <?php
            require_once(SRC."../dashboard/header.php");
        ?>
        <main>
        <div id="cadastro"> 
            <div id="cadastroTitulo"> 
                <h1> Cadastro de Produtos</h1>
            </div>
            <div id="cadastroInformacoes">
                <!-- 
                    Principais elementos de formulário para HTML5
                    <input type = "tel"> indica que a caixa recebe um telefone
                    <input type = "email"> indica que a caixa recebe um email com o minimo necessário para ser um email (@)
                    <input type = "url"> indica que a caixa recebe uma URL válida (http://)
                    <input type = "number"> indica que a caixa recebe apenas numeros inteiros
                    <input type = "range"> cria um elemento tipo barra de rolagem horizontal
                    <input type = "color"> cria uma paleta de cor para escolha do usuário
                    <input type = "date"> Cria um calendário para escolha da data
                    <input type = "month"> Cria um calendário para escolha somente do mes e ano
                    <input type = "week"> Cria um calendário que retorna o numero da semana do ano

                -->

            <!-- as variaveis modo e id que foram utilizadas no action form, são responsssaveis por encaminha para a pagina recebedados.php duas informações: modo que é reponsavel por definir se é par inserir ou atualizar e o id que é reponsavel por identifica um regitro que vai atualizar no BD
        
        enctype="multipart/form-data" é obrigatório ser utilizado quando for trabalhar com imagem
        OBS:PARA TRABALHAR COM A INPUT type="file" É OBRIGATÓRIO UTILIZAR O MÉTODO POST-->

            <form enctype="multipart/form-data" action="controles/recebeDadosProdutos.php?modo=<?=$modo?>&id=<?=$id?>&nomeImagem=<?=$imagem?>" name="frmCadastro"
                method="post">

                <div class="campos">
                    <div class="cadastroInformacoesPessoais">
                        <label> Nome: </label>
                    </div>
                    <div class="cadastroEntradaDeDados">
                        <input type="text" name="txtNome" value="<?=$nome?>" placeholder="Digite seu Nome"
                            maxlength="100">
                    </div>
                </div>
                <div class="campos">
                    <div class="cadastroInformacoesPessoais">
                        <label> Imagem: </label>
                    </div>
                    <div class="cadastroEntradaDeDados">
                        <input type="file" name="fleImagem" accept="image/jpeg, image/jgp, image/png">
                        <div id="visualizarImagem">
                            <img id="imagemAmostra" src="<?=NOME_DIRETORIO_FILE .$imagem?>">
                        </div>
                    </div>
                </div>
                <div class="campos">
                    <div class="cadastroInformacoesPessoais">
                        <label> Valor: </label>
                    </div>
                    <div class="cadastroEntradaDeDados">
                        <input type="text" name="txtValor" value="<?=$valor?>">
                    </div>
                </div>
                <div class="campos">
                    <div class="cadastroInformacoesPessoais">
                        <label> Destaque: </label>
                    </div>
                    <div class="cadastroEntradaDeDados">
                        <input type="text" name="txtDestaque" value="<?=$destaque?>">
                    </div>
                </div>
                <div class="campos">
                    <div class="cadastroInformacoesPessoais">
                        <label> Desconto: </label>
                    </div>
                    <div class="cadastroEntradaDeDados">
                        <input type="text" name="txtDesconto" value="<?=$desconto?>">
                    </div>
                    </div>
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label>Descricao: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <textarea name="txtDescricao" cols="50" rows="7"><?=$descricao?></textarea>
                        </div>
                    </div>
                    <div class="enviar">
                        <div class="enviar">
                            <input type="submit" name="btnEnviar" value="<?=$modo?>">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="consultaDeDados">
            <table id="tblConsulta" >
                <tr>
                    <td id="tblTitulo" colspan="6">
                        <h1> Consulta de Dados.</h1>
                    </td>
                </tr>
                <tr id="tblLinhas">
                    <td class="tblColunas destaque"> Nome </td>
                    <td class="tblColunas destaque"> Valor </td>
                    <td class="tblColunas destaque"> Destaque </td>
                    <td class="tblColunas destaque"> Desconto </td>
                    <td class="tblColunas destaque"> Imagens </td>
                    <td class="tblColunas destaque"> Opções </td>
                </tr>
                
                <?php 
                    $dadosProdutos = exibirProduto();
                if($dadosProdutos !== false){
                    while ($rsProdutos=mysqli_fetch_assoc($dadosProdutos))
                    {
                ?>
                <tr id="tblLinhas">
                    <td class="tblColunas registros"><?=$rsProdutos['nome']?></td>
                    <td class="tblColunas registros"><?=$rsProdutos['valor']?></td>
                    <td class="tblColunas registros"><?=$rsProdutos['destaque']?></td>
                    <td class="tblColunas registros"><?=$rsProdutos['desconto']?></td>
                    <td class="tblColunas registros">
                        <img class = "foto" src="<?=NOME_DIRETORIO_FILE . $rsProdutos['imagem']?>" alt="" >
                    </td>
                    <td class="tblColunas registros">
                        
                        <a href="./controles/editaDadosProdutos.php?id=<?=$rsProdutos['idProdutos']?>">
                            <img src="img/edit.png" alt="Editar" title="Editar" class="editar">
                        </a>
                        <a onclick="return confirm('Tem certeza que deseja ecluir?');" href="./controles/excluiDadosProdutos.php?id=<?=$rsProdutos['idProdutos']?>&imagem=<?=$rsProdutos['imagem']?>">
                            <img src="img/trash.png" alt="Excluir" title="Excluir" class="excluir">
                        </a>
                        
                            <img src="img/search.png" alt="Visualizar" title="Visualizar" class="pesquisar" data-id="<?=$rsProdutos['idProdutos']?>">
       
                    </td>
                </tr>
                <?php 
                    } }
                ?>
            </table>
        </div>
        </main>
        <?php
            require_once(SRC."../dashboard/footer.php");
        ?>
    </body>
</html>