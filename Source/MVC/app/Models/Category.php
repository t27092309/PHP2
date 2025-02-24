<?php
// Đặt namespace
namespace App\Models;
use App\Models\Model;
// Kết nối, truy vấn, thao tác với CSDL
class Category extends Model{



    // // Kết nối CSDL
    // // Thuộc tính kết nối
    // public $host = 'localhost'; //IP máy chủ CSDL
    // public $dbname = 'php2';
    // public $username = 'root';
    // public $password = '';
    // public $table = 'product';
    // public $conn; // Thuộc tính kết nối
    // // Tạo phương thức kết nối
    // public function getConnection()
    // {
    //     try {
    //         $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);
    //         // Thiết lập chế độ lỗi và warning;
    //         $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //         $this->conn->exec("set names utf8");
    //         echo "Connect successfully";
    //     } catch (Exception $e) {

    //         echo "Error: " . $e->getMessage();
    //     }
    // }
    protected $table = 'category';
    // Thuộc tính kết nối CSDL
    private $connection;
    // Phương thức khởi tạo kết nối CSDL thông qua Model
    public function __construct()
    {
        $this->connection = new Model();
    }
    // Truy vấn CSDL
    // Truy vấn lấy tất cả thông tin
    public function getAllCategory(){
        $sql = "SELECT * FROM {$this->table}";
        $this->connection->setSQL($sql);
        return $this->connection->all();
    }
    // Truy vấn theo id
    public function getIdCategory($id_category){
        $sql = "SELECT * FROM {$this->table} WHERE id_category = ?";
        $this->connection->setSQL($sql);
        return $this->connection->first([$id_category]);    }
    // Thao tác với CSDL
    // Thêm
    public function addCategory($id_category, $name_category, $description_category){
        $sql = "INSERT INTO {$this->table} VALUES (?,?,?)";
        $this->connection->setSQL($sql);
        return $this->connection->execute([$id_category, $name_category, $description_category]);
    }
    // Sửa
    public function updateCategory($id_category, $name_category, $description_category){
        $sql = "UPDATE {$this->table} SET name_category = ?, description_category = ? WHERE id_category = ?";
        $this->connection->setSQL($sql);
        return $this->connection->execute( [$name_category, $description_category, $id_category]);
    }
    // Xóa
    public function deleteCategory($id_category){
        $sql = "DELETE FROM {$this->table} WHERE id_category = ?";
        $this->connection->setSQL($sql);
        return $this->connection->execute([$id_category]);
    }
}
