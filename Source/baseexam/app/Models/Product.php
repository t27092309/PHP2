<?php
namespace App\Models;
use App\Models\Model;

class Product extends Model{
    protected $table = 'products';
    private $connection;

    public function __construct()
    {
        $this->connection = new Model();
    }

    public function getAllProduct(){
        $sql = "SELECT * FROM {$this->table}";
        $this->connection->setSQL($sql);
        return $this->connection->all();
    }

    public function getProduct($id){
        $sql = "SELECT * FROM {$this->table} WHERE id = ?";
        $this->connection->setSQL($sql);
        return $this->connection->first([$id]);
    }

    public function addProduct($id, $category_id, $name, $img_thumbnail, $description, $created_at, $update_at){
        $sql = "INSERT INTO {$this->table} VALUES(?,?,?,?,?,?,?)";
        $this->connection->setSQL($sql);
        return $this->connection->execute([$id, $category_id, $name, $img_thumbnail, $description, $created_at, $update_at]);
    }

    public function updateProduct($id, $category_id, $name, $img_thumbnail, $description, $created_at, $update_at){
        $sql = "UPDATE {$this->table} SET category_id = ?, name = ?, img_thumbnail = ?, description = ?, created_at = ?, update_at = ? WHERE id = ? ";
        $this->connection->setSQL($sql);
        return $this->connection->execute([ $category_id, $name, $img_thumbnail, $description, $created_at, $update_at, $id]);
    }

    public function deleteProduct($id){
        $sql = "DELETE FROM {$this->table} WHERE id = ? ";
        $this->connection->setSQL($sql);
        return $this->connection->execute([$id]);
    }
}
?>