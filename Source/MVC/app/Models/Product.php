<?php
// Đặt namespace
namespace App\Models;
use App\Models\Model;
// Kết nối, truy vấn, thao tác với CSDL
class Product extends Model{



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
    protected $table = 'product';
    // Thuộc tính kết nối CSDL
    private $connection;
    // Phương thức khởi tạo kết nối CSDL thông qua Model
    public function __construct()
    {
        $this->connection = new Model();
    }
    // Truy vấn CSDL
    // Truy vấn lấy tất cả thông tin
    public function getAllProduct(){
        $sql = "SELECT * FROM {$this->table}";
        $this->connection->setSQL($sql);
        return $this->connection->all();
    }
    // Truy vấn theo id
    public function getIdProduct($id){
        $sql = "SELECT * FROM {$this->table} WHERE id = ?";
        $this->connection->first([$id]);
    }
    // Thao tác với CSDL
    // Thêm
    public function addProduct($id, $tenSP, $gia, $moTa){
        $sql = "INSERT INTO {$this->table} VALUES (?,?,?,?)";
        $this->connection->setSQL($sql);
        return $this->connection->excute([$id, $tenSP, $gia, $moTa]);
    }
    // Sửa
    public function updateProduct($id, $tenSP, $gia, $moTa){
        $sql = "UPDATE {$this->}"
    }
    // Xóa
}
