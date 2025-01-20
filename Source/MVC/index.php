<?php
// include 'app/Models/Product.php';

// $connect = new Product();
// $connect->getConnection();

// include 'app/Models/Model.php';
// include 'app/Models/Product.php';
include 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/');
$dotenv->load();
use App\Models\Product;
$pro = new Product();
var_dump($pro->getAllProduct());
// var_dump($pro->getIdProduct(1));
var_dump($pro->getAllProduct());
// $pro->addProduct(null, 'Test2', 1000, 'Test 2 add');
// $pro->updateProduct(1, 'update', 999, 'uppdateeee');

// $connection = new Model();
// $sql = "SELECT * FROM product";
// $connection->setSQL($sql);
// var_dump($connection->all());
// $sql = "INSERT INTO product VALUES(?,?,?,?)";
// $connection->setSQL($sql);
// $data = [null, "Test1", 1000, "Test model"];
// $connection->excute($data);  // đổi protected sang public (setSQL, execute) mới chạy dc
?>