<?php 
/*********************************************
    Objetivo: Arquivo de de configuração de varaiveis e constantes que serão utilizadas no sistema 
    Data: 15/09/2021
    Autor: Marcel
*********************************************/
//constante para indicar a pasta raiz do servidor + a estrutara de diretório até o meu projeto
define ('SRCU', $_SERVER['DOCUMENT_ROOT'].'/ds2t20212/Back-End/Projeto-GoodBurguers-Copia/Admin/crud-Usuario/');

//Variaveis e constantes para conexão com o Banco de Dados MySql
const BD_SERVER = 'localhost';
const BD_USER = 'root';
const BD_PASSWORD = 'bcd127';
const BD_DATABASE = 'dbgoodburguers2';


//Mensagens de Erro do sistema
const ERRO_CONEXAO_BD = "Não foi possivel realizar a conexão com o Banco de Dados, entre em contato com o Administrador do sistema.";

const ERRO_CAIXA_VAZIA = "<script>alert('Não foi possivel realizar a operção, pois existem campos obrigatórios a serem preenchidos'); window.history.back();</script>";

const ERRO_MAXLENGHT = "<script>alert('Não foi possivel realizar a operção, pois a quantidade de caracteres ultrapassa o permitido no Banco de Dados'); window.history.back();</script>";

//Mensagens de aceitação e validação de dados no BD
const BD_MSG_INSERIR = "Registro salvo com sucesso no Banco de Dados!";

const BD_MSG_EXCLUIR = "
            <script>
                alert('Registro excluido com sucesso do Banco de Dados');
                window.location.href='../dashboard.php';
            </script>";

const LOGIN_MSG_INVALIDO = "
            <script>
                alert('Usuário ou senha invalidos!!!');
                window.location.href='../index.php';
            </script>";
const BD_MSG_ERRO = "ERRO: Não foi possivel manipular os dados no Banco de Dados!";


// constantes para upload de arquivos 
define('NOME_DIRETORIO_FILE', "arquivos/");
$extensoesPermitidasFile = array  ("image/png", "image/jpg", "image/jpeg");
define('EXTENSOES_PERMITIDAS', $extensoesPermitidasFile);
const TAMANHO_FILE = "5120";

?>