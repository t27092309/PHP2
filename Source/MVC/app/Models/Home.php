<?php
// Đặt namespace
namespace App\Models;
use App\Models\Model;
// Kết nối, truy vấn, thao tác với CSDL
class Home extends Model{

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
    public function homeProduct(){
        $sql = "SELECT * FROM {$this->table}";
        $this->connection->setSQL($sql);
        return $this->connection->all();
    }

}
