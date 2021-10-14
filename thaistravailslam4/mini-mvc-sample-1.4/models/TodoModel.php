<?php
namespace models;

use models\base\SQL;

class TodoModel extends SQL
{
    public function __construct()
    {
        parent::__construct('todos', 'id');
    }
    function todoNonTermine()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM todos WHERE termine = 0;");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    function marquerCommeTermine($id){
        $stmt = $this->pdo->prepare("UPDATE todos SET termine = 1 WHERE id = ?");
        $stmt->execute([$id]);
    }
    function ajouterTodo($texte){
        $stmt = $this->pdo->prepare("INSERT INTO todos VALUES (null, ?, 0, null);");
        $stmt->execute([$texte]);
    }
}