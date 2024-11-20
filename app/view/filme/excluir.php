<?php 

require_once __DIR__."/../../model/Filme.php";

if ($_SERVER['REQUEST_METHOD'] === "POST"){
    $id = $_POST["id"];

    if (!empty($id)) {
        $filmeModel = new Filme();
        $filmeModel->excluir($id);

        return header("Location: listar.php");
    }
}
return header("Location: listar.php");
?>