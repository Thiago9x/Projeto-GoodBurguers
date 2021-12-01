<?php
    /*********************************************
    Objetivo: Arquivo para fazer upload de imagens
    Data: 03/11/2021
    Autor: Marcel
*********************************************/
    // Função para fazer upload de arquivos
    function uploadFile($arrayFile)
    {
        $imagemFile = $arrayFile;
        $tamanhoOriginal = (int) 0;
        $tamanhoKB = (int) 0;
        $extensao = (string) null;
        $tipoArquivo = (string) null; 
        $nomeArquivo = (string) null;
        $nomeArquivoCript = (string) null;
        $imagem = (string) null;
        $arquivoTemp = (string) null;
        // Valida se o arquivo existe no array 
        IF($imagemFile['size'] >0 && $imagemFile['type'] != "")
        {
            // recebe o tamanho original do arquivo em byte 
            $tamanhoOriginal = $imagemFile['size'];

            // converte o tamanho original em KBytes
            $tamanhoKB = $tamanhoOriginal/1024;

            // recebe a extensao original do arquivo 
            $tipoArquivo = $imagemFile['type'];

            // VALIDA SE O TAMANHO DO ARQUIVO É MENOR DO QUE O PERMITIDO
            if($tamanhoKB <= TAMANHO_FILE){
                // Validação para percorrer o array de extensoes permitidas buscando a extensao do arquivo atua se encontra retorna true 
                if(in_array($tipoArquivo, EXTENSOES_PERMITIDAS)){
                        // PERMITE EXTRAIR APENAS O NOME DE UM ARQUIVO SEM A EXTENSAO
                        $nomeArquivo = pathinfo($imagemFile['name'],PATHINFO_FILENAME);
                        // PERMITE EXTRAIR APENAS A EXTENSAO DE UM ARQUIVO SEM O NOME
                        $extensao = pathinfo($imagemFile['name'],PATHINFO_EXTENSION);

                        // algoritimos de criptografia no PHP 
                        // hash('sha256', 'variavel')
                        // sha1('variavel')
                        // md5('variavel') 

                        // uniquid() - gera uma sequencia numerica com base nas configurações de hardware da maquina 

                        // time() pega a hora:minuto:segundo atual
                        $nomeArquivoCript = md5($nomeArquivo.uniqid(time()));
                        // monta o novo nome do arquivo com a extensao 
                        $imagem = $nomeArquivoCript.".".$extensao;
                        
                        // Recebe o nome do arquivo temporario que foi gerado quando o apache recebeu o arquivo do form 
                        $arquivoTemp = $imagemFile['tmp_name'];
                            
                        // move_upload_file - move o arquivo da pasta temporaria do apache para a pasta do servidor que foi criada 
                        if(move_uploaded_file($arquivoTemp, SRC.NOME_DIRETORIO_FILE. $imagem )){
                            return $imagem;
                        }
                        else{
                            echo('Erro no upload do arquivo');
                        }
                }
                else
                    echo('Erro tipo de arquivo');
            }
            else{
                echo('Erro tamanho do arquivo');
            }
        }
        die;//serve para parar a execução do código do apache
    }

?>