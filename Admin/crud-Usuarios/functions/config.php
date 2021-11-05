<?php 
/*********************************************
    Objetivo: Arquivo de de configuração de varaiveis e constantes que serão utilizadas no sistema 
    Data: 15/09/2021
    Autor: Marcel
*********************************************/
//constante para indicar a pasta raiz do servidor + a estrutara de diretório até o meu projeto
define ('SRC', $_SERVER['DOCUMENT_ROOT'].'/ds2t2021/Back-End/Projeto-GoodBurguers/Admin/crud-Categoria/');

//Variaveis e constantes para conexão com o Banco de Dados MySql
const BD_SERVER = 'localhost';
const BD_USER = 'root';
const BD_PASSWORD = 'bcd127';
const BD_DATABASE = 'dbgoodburguers';


//Mensagens de Erro do sistema
const ERRO_CONEXAO_BD = "Não foi possivel realizar a conexão com o Banco de Dados, entre em contato com o Administrador do sistema.";

const ERRO_CAIXA_VAZIA = "<script>alert('Não foi possivel realizar a operção, pois existem campos obrigatórios a serem preenchidos'); window.history.back();</script>";

const ERRO_MAXLENGHT = "<script>alert('Não foi possivel realizar a operção, pois a quantidade de caracteres ultrapassa o permitido no Banco de Dados'); window.history.back();</script>";

//Mensagens de aceitação e validação de dados no BD
const BD_MSG_INSERIR = "Registro salvo com sucesso no Banco de Dados!";
<<<<<<< HEAD:Admin/crud-Categoria/functions/config.php
const BD_MSG_ERRO = "<script>alert('ERRO: Não foi possivel manipular os dados no Banco de Dados!')</script>";

const BD_MSG_EXCLUIR = "<script>
                            alert('Registro foi excluido com êxito!!');
                            window.location.href='../dashboard.php';
                        </script>";


=======
const BD_MSG_EXCLUIR = "
            <script>
                alert('Registro excluido com sucesso do Banco de Dados');
                window.location.href='../index.php';
            </script>";
const BD_MSG_ERRO = "ERRO: Não foi possivel manipular os dados no Banco de Dados!";


// constantes para upload de arquivos 
define('NOME_DIRETORIO_FILE', "arquivos/");
$extensoesPermitidasFile = array  ("image/png", "image/jpg", "image/jpeg");
define('EXTENSOES_PERMITIDAS', $extensoesPermitidasFile);
const TAMANHO_FILE = "5120";
>>>>>>> 7542e95bdd640ea25f5731ddb4c92aaa4a762798:Admin/crud-Usuarios/functions/config.php
?>