<?php
    $response = '';
    if(isset($_GET['sucesso']))
        $response = 'Sucesso ao enviar o arquivo!';
    if(isset($_GET['falha']))
        $response = $_GET['falha'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Formuçário de upload </title>

    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
    <fieldset>
        <legend> upload super simples de arquivo </legend>
        <span><?= $response ?> </span>
        <form method="POST" action="upload_simples.php" enctype="multipart/form-data">
            <label for="arquivo_selecionado">Envie uma foto: </label> 
            <input type="file" name="arquivo_selecionado"/>
            <button type="submit">Enviar</button>
        </form>
    </fieldset>
</body>
</html>