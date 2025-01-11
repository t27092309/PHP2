<?php
// Kết nối, truy vấn, thao tác với CSDL
class Product
{
    // Kết nối CSDL
    // Thuộc tính kết nối
    public $host = 'localhost'; //IP máy chủ CSDL
    public $dbname = 'php2';
    public $username = 'root';
    public $password = '';
    public $table = 'product';
    public $conn; // Thuộc tính kết nối
    // Tạo phương thức kết nối
    public function getConnection()
    {
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);
            // Thiết lập chế độ lỗi và warning;
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->exec("set names utf8");
            echo "Connect successfully";
        } catch (Exception $e) {

            echo "Error: " . $e->getMessage();
        }
    }
}
