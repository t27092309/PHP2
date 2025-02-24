<?php
namespace App\Models;
use App\Models\Model;

class Category extends Model{
    protected $table = 'categories';
    private $connection;

    public function __construct()
    {
        $this->connection = new Model();
    }

    public function getAllCategory(){
        $sql = "SELECT * FROM {$this->table}";
        $this->connection->setSQL($sql);
        return $this->connection->all();
    }

    public function getCategory($id){
        $sql = "SELECT * FROM {$this->table} WHERE id = ?";
        $this->connection->setSQL($sql);
        return $this->connection->first([$id]);
    }

    public function addCategory($id, $name){
        $sql = "INSERT INTO {$this->table} VALUES(?,?,?,?,?,?,?)";
        $this->connection->setSQL($sql);
        return $this->connection->execute([$id,$name]);
    }

    public function updateCategory($id, $name){
        $sql = "UPDATE {$this->table} SET name = ? WHERE id = ? ";
        $this->connection->setSQL($sql);
        return $this->connection->execute([$name, $id]);
    }

    public function deleteCategory($id){
        $sql = "DELETE FROM {$this->table} WHERE id = ? ";
        $this->connection->setSQL($sql);
        return $this->connection->execute([$id]);
    }
}
?>