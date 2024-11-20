<?php 
require_once __DIR__ ."\..\config\database.php";
// Class que representa a tabela filme no projeto

class Filme {
    private $tabela = "filme";
    private $pdo;

    //colunas da tabela
    public $nome;
    public $ano;
    public $descricao;

    public function __construct() {
        global $pdo;

        $this->pdo = $pdo;
}
    public function findAll() {
        
        $query = "SELECT * FROM $this->tabela";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS,__CLASS__);

        return $stmt->fetchAll();

}   

    //Metodo para Buscar Id
    public function findById($id) {
        $query = "SELECT * FROM $this->tabela WHERE id = :id";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS,__CLASS__);

        return $stmt->fetch();
    }

    public function excluir($id){
        $query = "DELETE FROM $this->tabela WHERE id = :id";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->rowCount() > 0;

    }
}