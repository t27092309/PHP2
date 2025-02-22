<?php
// Bất cứ class nào trong model đều cần kết nối đến CSDL và đều cần thực hiện một số thao tác hoặc truy vấn CSDL 
// -> cần 1 class chung tạo ra các tài nguyên để dễ thực hiện trong quá trình làm 
namespace App\Models;

use PDO;

class Model
{
    // Thuộc tính
    // Cấu hình kết nối CSDLCSDL
    // private $host = 'localhost'; //IP máy chủ CSDL
    // private $dbname = 'php2';
    // private $username = 'root';
    // private $password = '';
    // Xử lý
    private $pdo; // Đối tượng PDO để kết nối
    private $sql; // Câu lệnh truy vấn
    private $sta; // Đối tượng chứa câu lệnh truy vấn(PDOStatement) sau thực thi
    // Khai báo hằng số để phân biệt chế độ truy vấn 

    const FETCH_ALL = 'all'; // Lấy tất cả bản ghi
    const FETCH_FIRST = "first"; // Lấy bản ghi đầu tiên

    // Phương thức khởi tạo
    public function __construct()
    {
        $this->pdo = $this->getConnection();
    }
    // Phương thức kết nối
    public function getConnection()
    {
        try {
            $connection = new PDO(
                "mysql:host={$_ENV['DB_HOST']};
            dbname={$_ENV['DB_NAME']}",
                $_ENV['DB_USER'],
                $_ENV['DB_PASSWORD'],
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
                ]
            );
            return $connection;
        } catch (PDOException $e) {
            throw new Exception("Connection error: " . $e->getMessage());
        }
    }
    // Phương thức thiết lập câu lệnh truy vấn
    public function setSQL($sql)
    {
        $this->sql = $sql;
    }
    // Phương thức thực thi câu lệnh truy vấn
    public function execute($options = [])
    {
        try {
            $this->sta = $this->pdo->prepare($this->sql);
            if (!empty($options)) {
                foreach ($options as $key => $value) {
                    $this->sta->bindValue($key+1, $value); // Sử dụng bindValue để tự động xác định kiểu dữ liệu
                }
            }
            $this->sta->execute();
            return $this->sta;
        } catch (PDOException $e) {
            throw new Exception("Thực thi lỗi: " . $e->getMessage());
        }
    }
    // Phương thức lấy dữ liệu từ câu truy vấn 
    // Truy vấn -> có nhiều bản ghi, 1 bản ghi (id)

    public function executeQuery($options = [], $fetchMode = self::FETCH_ALL)
    {
        // Mặc định là lấy nhiều bản ghi
        $result = $this->execute($options);
        if (!$result) {
            return false;
        }
        return $fetchMode === self::FETCH_FIRST
            ? $result->fetch(PDO::FETCH_OBJ)
            : $result->fetchAll(PDO::FETCH_OBJ);
    }
    // Lấy kết quả từ truy vấn
    // Lấy nhiều bản ghi
    public function all($options = [])
    {
        return $this->executeQuery($options, self::FETCH_ALL);
    }
    public function first($options = [])
    {
        return $this->executeQuery($options, self::FETCH_FIRST);
    }
    // Đóng kết nối

    public function __destruct()
    {
        $this->pdo = null;
    }
}
