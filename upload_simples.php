<?php
    try {
        $dir_destino = 'arquivos_enviados/';
        
        if(!isset($_FILES['arquivo_selecionado']))
        header('location: index.php?falha=Nenhum arquivo selecioando.');
        
        if( $_FILES['arquivo_selecionado']["error"] == 4 ){
            throw new Exception("Nenhum arquivo selecionado.");
        }

        if(!is_dir($dir_destino)){
            throw new Exception("Desculpe, o diretório não existe.");
        }

        if(is_executable($_FILES["arquivo_selecionado"]["tmp_name"])){
            throw new Exception("Erro. O arquivo é um executável.");
        }



        $nome_aleatorio = uniqid("up_");
        $extensao_arquivo = pathinfo($_FILES["arquivo_selecionado"]["name"], PATHINFO_EXTENSION);
        $arquivo_no_destino = $dir_destino . $nome_aleatorio . '.' . $extensao_arquivo;
        if(move_uploaded_file($_FILES["arquivo_selecionado"]["tmp_name"], $arquivo_no_destino)){
            header('location: index.php?sucesso=true');
        } else
            throw new Exception("Falha ao enviar o arquivo. Código: " . $_FILES["arquivo_selecionado"]["error"]);
        

    } catch (Exception $e) {
        header('location: index.php?falha=' .  'Erro: '. $e->getMessage());
    }




?>