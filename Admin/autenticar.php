<?php
    //import do arquivo de configurações de sistema
    require_once('./crud-Usuario/functions/config.php');

    //import do arquivo de conexão
    require_once(SRC.'bd/conexaoMysql.php');

    $login = (string) null;
    $senha = (string) null;

    $login = $_POST['txtLogin'];
    $senha = $_POST['txtSenha'];

    if($login == "" || $senha == ""){
        echo(LOGIN_MSG_INVALIDO);
    }
        else{
            $sql = "select * from tblUsuario where nome = '".$login."' and senha = '".$senha."'";

            $conexao = conexaoMysql();
        
            $select=mysqli_query($conexao,$sql);

            if($rsUsuario = mysqli_fetch_assoc($select)){
                header('location: dashboard/dashboard.php');
            }
        
    }
        
?>