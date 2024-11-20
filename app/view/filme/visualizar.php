<?php

require_once __DIR__ ."/../../config/env.php";
require_once __DIR__ ."/../../config/database.php";
require_once __DIR__ ."/../../model/Filme.php";

$id = $_GET["id"];

if ($id == "") {
    return header("Location: listar.php");
}

$filmeModel = new Filme();
$filme = $filmeModel->findById($id);

// var_dump(($filme))
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Detalhes do filme</h2>

    <h3>Nome: <?php echo $filme->nome?></h3>
    <p>Ano: <?php echo $filme->ano?></p>
    <p>Descrição: <?php echo $filme->descricao?></p>
    
    <!-- Voltar -->
    <button onclick="history.back()">Voltar</button>

    
</body>
</html>

 