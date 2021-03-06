<?php
session_start();
    $nome = (string) null;
    $email = (string) null;
    $telefone = (string) null;
    $id = (int) 0;
    //essa variavel será utilizada para definir o modo de manipulação com BD
    $modo = (string) "Salvar";
    
    //import do arquivo de configuração de variaveis e constantes
    require_once('Admin/crud-Contato/functions/config.php');    

    require_once('Admin/crud-Contato/bd/conexaoMysql.php');  
    conexaoMysql();  

    if(isset($_SESSION['contato'])){
        $nome = $_SESSION['contato']['nome'];
        $email = $_SESSION['contato']['email'];
        $telefone = $_SESSION['contato']['telefone'];
        $modo = "Salvar";
        unset($_SESSION['contato']);
    }
    // var_dump($_SESSION['Contato']);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/logoimg.jpg">
    <link href="style/style.css" rel="stylesheet" type="text/css">
    <title>Good Bugruers</title>
    <script src="js/jerry.js"></script>
    <script src="js/ancora.js"></script>
</head>

<body>

    <!-- Cabeçalho -->
    <header>
        <div><img id="logoimg" src="img/logo2.png"></div>
        <div id="redes">
            <div class="redeSocial">
                <a href="https://www.facebook.com/goodburgers__-106052787772098/" target="_blank">
                    <img class="imagemRedeSocial" src="img/face.png" alt="" class="logoSociais">
                </a>
            </div>
            <div class="redeSocial">
                <a href="https://www.instagram.com/goodburgers__/" target="_blank">
                    <img class="imagemRedeSocial" src="img/insta.png" alt="" class="logoSociais">
                </a>
            </div>
            <div class="redeSocial">
                <a href="https://www.ifood.com.br/delivery/maua-sp/good-burgers-vila-nossa-senhora-das-vitorias/18c0d6c7-283e-448b-821e-5761e6d54739"
                    target="_blank">
                    <img class="imagemRedeSocial" src="img/ifood.png" alt="" class="logoSociais">
                </a>
            </div>
        </div>
    </header>
    <div id="menu">
        <ul id="lista">
            <a href="#conteudoEmpresa">
                <li class="itemLista">Empresa</li>
            </a>
            <a href="#promocoes">
                <li class="itemLista">Promoções</li>
            </a>
            <a href="#destaques">
                <li class="itemLista">Destaques</li>
            </a>
            <a href="#lojasEcontatos">
                <li class="itemLista">Lojas</li>
            </a>
            <a href="#lojasEcontatos">
                <li class="itemLista">Contatos</li>
            </a>
        </ul>
    </div>
    <div id="banner">
        <img id="bannerFoto" src="img/banner.jpg" alt="">
    </div>

    
    <!-- Div conteudo principal -->
    <form name="frmConteudo" action="./Admin/crud-Contato/controles/recebeDadosContatos.php?modo=<?=$modo?>&id=<?=$id?>" method="post">
        <!-- Corpo - Conteudo -->
        <main>
            <!-- menu hamurguer e campo de pesquisa  -->
            <div id="topoPrincipal">
                <!-- parte menu hamburguer -->
                <div id="iconBurguer">
                    <a href=""><img src="img/menuHam.png" alt="" id="imgMenuBurguer"></a>
                </div>
                <!-- parte da pesquisa  -->
                <div id="campoPesquisa">
                    <label id="txtPesquisa" for="">Pesquisar </label>
                    <input id="pesquisar" type="text" placeholder="Faça sua Pesquisa aqui" size="30" maxlength="30">
                    <input id="btnPesquisar" type="submit" value="Pesquisar">
                </div>
            </div>
            <!-- começo dos conteudos dos lanches -->
            <div id="conteudoPrincipal">
                <div class="caixaPrincipal">
                    <img class="imgProduto" src="img/Cheddar.jpeg" alt="" class="configImgProdutos">
                    <div class="nomeProduto">
                        <h2>Cheddar</h2>
                    </div>
                    <div class="descricaoProduto">
                        <p>Pão australiano, delicioso hambúrguer artesanal (180g), fatias de bacon, cheddar cremoso e
                            cebola caramelizada.</p>
                    </div>
                    <div class="finalPrincipal">
                        <div class="saibaMais">
                            <input type="submit" value="Saiba Mais" class="btnSaibaMais">
                        </div>
                        <div class="produtoPreco">
                            <h4 class="preco">$0,00</h4>
                        </div>
                    </div>
                </div>

                <div class="caixaPrincipal">
                    <img class="imgProduto" src="img/BaconGood.jpeg" alt="" class="configImgProdutos">
                    <div class="nomeProduto">
                        <h2>Bacon Good</h2>
                    </div>
                    <div class="descricaoProduto">
                        <p>Pão de hambúrguer, delicioso hambúrguer artesanal (180g), fatias de bacon, maionese de bacon,
                            queijo prato, picles e cebola roxa.</p>
                    </div>
                    <div class="finalPrincipal">
                        <div class="saibaMais">
                            <input type="submit" value="Saiba Mais" class="btnSaibaMais">
                        </div>
                        <div class="produtoPreco">
                            <h4 class="preco">$0,00</h4>
                        </div>
                    </div>
                </div>
                <div class="caixaPrincipal">
                    <img class="imgProduto" src="img/goodBurguer.jpeg" alt="" class="configImgProdutos">
                    <div class="nomeProduto">
                        <h2>Good Burguer</h2>
                    </div>
                    <div class="descricaoProduto">
                        <p>Pão de hambúrguer, 2 deliciosos hambúrgueres artesanais de 180g cada, queijo prato, cheddar
                            cremoso, bacon e cebola caramelizada.</p>
                    </div>
                    <div class="finalPrincipal">
                        <div class="saibaMais">
                            <input type="submit" value="Saiba Mais" class="btnSaibaMais">
                        </div>
                        <div class="produtoPreco">
                            <h4 class="preco">$0,00</h4>
                        </div>
                    </div>
                </div>
                <div class="caixaPrincipal">
                    <img class="imgProduto" src="img/Classic.jpeg" alt="" class="configImgProdutos">
                    <div class="nomeProduto">
                        <h2>Classic</h2>
                    </div>
                    <div class="descricaoProduto">
                        <p>Pão de hambúrguer, delicioso hambúrguer artesanal (180g) e queijo prato.</p>
                    </div>
                    <div class="finalPrincipal">
                        <div class="saibaMais">
                            <input type="submit" value="Saiba Mais" class="btnSaibaMais">
                        </div>
                        <div class="produtoPreco">
                            <h4 class="preco">$0,00</h4>
                        </div>
                    </div>
                </div>
                <div class="caixaPrincipal">
                    <img class="imgProduto" src="img/Gorgonzola.jpeg" alt="" class="configImgProdutos">
                    <div class="nomeProduto">
                        <h2>Gorgonzola</h2>
                    </div>
                    <div class="descricaoProduto">
                        <p>Pão de hambúrguer, delicioso hambúrguer artesanal (180g), queijo prato, gorgonzola, bacon e
                            rúcula.</p>
                    </div>
                    <div class="finalPrincipal">
                        <div class="saibaMais">
                            <input type="submit" value="Saiba Mais" class="btnSaibaMais">
                        </div>
                        <div class="produtoPreco">
                            <h4 class="preco">$0,00</h4>
                        </div>
                    </div>
                </div>
                <div class="caixaPrincipal">
                    <img class="imgProduto" src="img/SaladGood.jpeg" alt="" class="configImgProdutos">
                    <div class="nomeProduto">
                        <h2>Salad Good</h2>
                    </div>
                    <div class="descricaoProduto">
                        <p>Pão de hambúrguer, delicioso hambúrguer artesanal (180g), queijo prato, Catupiry, maionese
                            verde, alface americana e tomate.</p>
                    </div>
                    <div class="finalPrincipal">
                        <div class="saibaMais">
                            <input type="submit" value="Saiba Mais" class="btnSaibaMais">
                        </div>
                        <div class="produtoPreco">
                            <h4 class="preco">$0,00</h4>
                        </div>
                    </div>
                </div>
            </div>
            <!-- conteudo sobre a empresa -->
            <div id="conteudoEmpresa">
                
                <div id="txtEmpresa">
                    <h1 class="tituloConteudo">Empresa</h1>
                    <p class="PtxtConteudo">
                        Hambúrgueres preparados com as carnes mais nobres, grelhados no fogo como churrasco. Utilizamos
                        os melhores ingredientes, para proporcionar a verdadeira experiência de um Good Burgers.
                        Hambúrguer artesanal, burger artesanal, fritas, batata frita, cupom, desconto, cupom de
                        desconto, hambúrgueres, cheddar e bacon, batata rústica, bolinho de cupim, x bacon, x salada,
                        hamburgueria artesanal, entrega grátis, compre 1 leve 2, coca cola, refrigerante, porções,
                        melhor hambúrguer.
                    </p>
                </div>
                <div id="imgEmpresa">
                    
                </div>
            </div>
            <!-- conteudo promoções -->
            <div id="promocoes">
                <div class="espacoTituloPromocoes">
                    <h1 class="tituloConteudo">Nossas Promoções</h1>
                </div>
                <div id="conteudoPromocoes">
                    <div class="caixaPrincipal">
                        <img class="imgProduto" src="img/Cheddar.jpeg" alt="" class="configImgProdutos">
                        <div class="nomeProduto">
                            <h2>Cheddar + fritas M + refrigerante</h2>
                        </div>
                        <div class="descricaoProduto">
                            <br>
                            <p>Pão australiano, delicioso hambúrguer artesanal (180g), fatias de bacon, cheddar cremoso e cebola caramelizada.</p>
                        </div>
                        <div class="finalPrincipal">
                            <div class="saibaMais">
                                <input type="submit" value="Saiba Mais" class="btnSaibaMais">
                            </div>
                            <div class="produtoPreco">
                                <h4 class="preco">$0,00</h4>
                            </div>
                        </div>
                    </div>
                    <div class="caixaPrincipal">
                        <img class="imgProduto" src="img/BaconGood.jpeg" alt="" class="configImgProdutos">
                        <div class="nomeProduto">
                            <h2>Bacon good + fritas M + refrigerante</h2>
                        </div>
                        <div class="descricaoProduto">
                            <br>
                            <p>Pão de hambúrguer, delicioso hambúrguer artesanal (180g), fatias de bacon, maionese de bacon, queijo prato, picles e cebola roxa.</p>
                        </div>
                        <div class="finalPrincipal">
                            <div class="saibaMais">
                                <input type="submit" value="Saiba Mais" class="btnSaibaMais">
                            </div>
                            <div class="produtoPreco">
                                <h4 class="preco">$0,00</h4>
                            </div>
                        </div>
                    </div>
                    <div class="caixaPrincipal">
                        <img class="imgProduto" src="img/cupimCrispy.webp" alt="" class="configImgProdutos">
                        <div class="nomeProduto">
                            <h2>Cupim crispy + fritas M + refrigerante</h2>
                        </div>
                        <div class="descricaoProduto">
                            <br>
                            <p>Pão de hambúrguer, burger artesanal (180g), delicioso cupim desfiado, queijo provolone, cebola crispy e maionese de alho poró defumada</p>
                        </div>
                        <div class="finalPrincipal">
                            <div class="saibaMais">
                                <input type="submit" value="Saiba Mais" class="btnSaibaMais">
                            </div>
                            <div class="produtoPreco">
                                <h4 class="preco">$0,00</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- conteudo destaques da empresa  -->
            <div class="espacoTituloconteudo">
                <h1 class="tituloConteudo">Nossos Destaques</h1>
            </div>
            <div id="destaques">
                <a href="">
                    <img class="imgDestaques" src="img/bolinhoCupim.jpeg" alt="">
                </a>
                <a href="">
                    <img class="imgDestaques" src="img/BaconGood.jpeg" alt="">
                </a>
                <a href="">
                    <img class="imgDestaques" src="img/goodBurguer.jpeg" alt="">
                </a>
                <a href="">
                    <img class="imgDestaques" src="img/Gorgonzola.jpeg" alt="">
                </a>
            </div>
            <!-- conteudo lojas e contatos  -->
            <div id="lojasEcontatos">
                <div id="lojas">
                    <div class="espacoTituloconteudo">
                        <h1 class="tituloConteudo">Nossa Loja</h1>
                    </div>
                    <img src="img/logoimg.jpg" alt="" id="imgLoja">
                    <div id="txtLoja">
                        <p>Rua Riachuelo, 733 - Vila Nossa Senhora das Vitorias</p>
                        <p>
                            Mauá - SP
                        </p>
                        <p>
                            CEP: 09360-030
                        </p>
                    </div>
                </div>
                <div id="contatos">
                    <div class="espacoTituloconteudo">
                        <h1 class="tituloConteudo">Entre em Contato</h1>
                        <div class="espacoContatos">
                        <label for="" class="lblcontatos">Nome: </label>
                        <input class="txtContatos" name="txtNome" type="text" placeholder="Digite seu Nome" maxlength="100" value="<?=$nome?>">
                        </div>
                        <div class="espacoContatos">
                            <label for="" class="lblcontatos">E-mail: </label>
                            <input class="txtContatos" name="txtEmail" type="text" placeholder="Digite seu Nome" maxlength="100" value="<?=$email?>">
                        </div>
                        <div class="espacoContatos">
                            <label for="" class="lblcontatos">Telefone: </label>
                            <input class="txtContatos" name="txtTelefone" type="text" placeholder="Digite seu Nome" maxlength="100" value="<?=$telefone?>">
                        </div>
                            <input id="btnEnviar" type="submit" value="<?=$modo?>">
                    </div>
                </div>
            </div>
        </main>
    </form>

    <!-- Rodapé -->
    <footer>
        <span>Copyright &copy; 2021  Thiago M. Trentin</span>
    </footer>

</body>

</html>