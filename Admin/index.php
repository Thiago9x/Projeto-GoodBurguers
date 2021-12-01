<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style2.css">
    <title>Login</title>
</head>
<body>
    <main>
        <h1>Autenticação para o CMS</h1>
        <h3>Good Burguer's</h3>
        <form action='autenticar.php'name='frmLogin' method="post">
            <div class="inserir">
            <label>
                Login:
            </label>
            <input type="text" name = 'txtLogin'  placeholder="Insira seu Login" maxlength="30">
            </div>
            <div class="inserir">
            <label>
                Senha:
            </label>
            <input type="text" name='txtSenha' placeholder="Insira sua Senha" maxlength="30">
            </div>

                <input type="submit" name="btnLogin" value="Login" id="botao">
            
        </form>
    </main>
</body>
</html>