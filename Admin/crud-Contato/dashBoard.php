<?php 
    $celular = (string) null;
    $email = (string) null;
    $telefone = (string) null;
    $id = (int) 0;
    //essa variavel será utilizada para definir o modo de manipulação com BD
    $modo = (string) "Salvar";
    
    //import do arquivo de configuração de variaveis e constantes
    require_once('functions/config.php');

    require_once(SRC."controles/exibirDadosContatos.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css" type="text/css">
    <title>Admin-Good Burguers</title>
</head>
<body>
    <?php
    require_once(SRC."../dashboard/header.php");
    ?>
    <main>
        <div id="consultaDeDados">
            <table id="tblConsulta" >
                <tr>
                    <td id="tblTitulo" colspan="5">
                        <h1> Consulta de Contatos</h1>
                    </td>
                </tr>
                <tr id="tblLinhas">
                    <td class="tblColunas destaque"> Nome</td>
                    <td class="tblColunas destaque"> Email </td>
                    <td class="tblColunas destaque"> Telefone </td>
                    <td class="tblColunas destaque"> Opções </td>
                 </tr>
                
                <?php 
                    $dadosContatos = exibirContatos();
                    
                    while ($rsContatos=mysqli_fetch_assoc($dadosContatos))
                    {
                ?>
                <tr id="tblLinhas">
                    <td class="tblColunas registros"><?=$rsContatos['nome']?></td>
                    <td class="tblColunas registros"><?=$rsContatos['email']?></td>
                    <td class="tblColunas registros"><?=$rsContatos['telefone']?></td>
                    <td class="tblColunas registros">
                        <a onclick="return confirm('Tem certeza que deseja excluir?');" href="./controles/excluirDadosContatos.php?id=<?=$rsContatos['idContato']?>">
                            <img src="img/trash.png" alt="Excluir" title="Excluir" class="excluir">       
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