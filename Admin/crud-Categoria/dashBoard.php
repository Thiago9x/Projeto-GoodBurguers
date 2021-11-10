<?php 
    $nome = (string) null;
    $id = (int) 0;
    //essa variavel será utilizada para definir o modo de manipulação com BD
    
    $modo = (string) "Salvar";
    
    //import do arquivo de configuração de variaveis e constantes
    require_once('functions/config.php');

    require_once(SRC."controles/exibirDadosCategorias.php");

    // require_once(SRC.'bd/conexaoMysql.php');
    // conexaoMysql();

    //verifica a existencia da variavel sessão que usamos para trazer os dados pqra o editar
    session_start();
    // var_dump($_SESSION["cliente"]);
    
    if(isset($_SESSION['Categoria']))
    {

        $id = $_SESSION['Categoria']['idCategoria'];
        $nome = $_SESSION['Categoria']['nome'];
        $modo = (string) "Atualizar";

        unset($_SESSION['Categoria']);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css" type="text/css">
    <title>Admin-Good Burguers</title>
    <script defer>
        $(document).ready(function(){
        $('#containerModal').css('display','none');
        // abre a modals 
            $('.pesquisar').click(function(){
                $('#containerModal').slideToggle(1000);
                // Recebe id do cliente 
                let idCategoria = $(this).data('id');
                // Realiza uma requisição para consumir dados de outra pagina 
                $.ajax({
                    type:"GET",// Tipo de requisição (GET,POST,PUT, etc)
                    url: "visualizarDados.php",//URL da pagina que será consumido
                    data:{id:idCategoria},
                    success: function(dados){//Se a requisição der certo iremos receb o conteudo na vairavel dados
                        $('#modal').html(dados);//exibi dentro da div modal
                    }
                });
            });
            $('#fecharModal').click(function (){
                $('#containerModal').fadeOut();
            });
        });
    </script>
</head>
<body>
    <?php
    require_once(SRC."../dashboard/header.php");
    ?>
    <main>
        <!-- <div id="containerModal">
            <span id="fecharModal"> 
                <img src="img/trash.png" alt="Excluir" title="Excluir" class="excluir">
            </span>
            <div id="modal">
            
            </div>
        </div> -->
        <div id="cadastro"> 
            <div id="cadastroTitulo"> 
                <h1> Categorias </h1>
            </div>
            <div id="cadastroInformacoes">
                <form action="controles/recebeDadosCategorias.php?modo=<?=$modo?>&id=<?=$id?>" name="frmCadastro" method="post" >
                   
                    <div class="campos">
                        <div class="cadastroInformacoesPessoais">
                            <label> Nome: </label>
                        </div>
                        <div class="cadastroEntradaDeDados">
                            <input type="text" name="txtNome" value="<?=$nome?>" placeholder="Digite seu Nome" maxlength="100">
                        </div>
                    </div>
                        <div class="enviar">
                            <input type="submit" name="btnEnviar" value="<?=$modo?>">
                        </div>
                </form>
            </div>
        </div>
        <div id="consultaDeDados">
            <table id="tblConsulta" >
                <tr>
                    <td id="tblTitulo" colspan="5">
                        <h1> Consulta de Categorias</h1>
                    </td>
                </tr>
                <tr id="tblLinhas">
                    <td class="tblColunas destaque" colspan="2"> Nome </td>
                </tr>
                
                <?php 
                    $dadosCategorias = exibirCategorias();
                    
                    while ($rsCategorias=mysqli_fetch_assoc($dadosCategorias))
                    {
                ?>
                <tr id="tblLinhas">
                    <td class="tblColunas registros"><?=$rsCategorias['nome']?></td>
                    <td class="tblColunas registros">
                        
                        <a href="./controles/editarDadosCategorias.php?id=<?=$rsCategorias['idCategoria']?>">
                            <img src="img/edit.png" alt="Editar" title="Editar" class="editar">
                        </a>
                        <a onclick="return confirm('Tem certeza que deseja ecluir?');" href="./controles/excluirDadosCategorias.php?id=<?=$rsCategorias['idCategoria']?>">
                            <img src="img/trash.png" alt="Excluir" title="Excluir" class="excluir">
                        </a>
                    </td>
                </tr>
                <?php 
                    } 
                ?>
            </table>
        </div>
    </main>
    <?php require_once("../dashboard/footer.php");?>
</body>
</html>