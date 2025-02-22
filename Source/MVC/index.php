<?php
// include 'app/Models/Product.php';

// $connect = new Product();
// $connect->getConnection();

// include 'app/Models/Model.php';
// include 'app/Models/Product.php';
session_start();
include 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/');
$dotenv->load();
include_once __DIR__ . '/routes/web.php';
// use App\Models\Product;
use App\Controllers\DashboardController;
use App\Controllers\ProductController;
use App\Controllers\CategoryController;
use App\Controllers\HomeController;

// $id = "";
// if (isset($_GET['id'])) {
//     $id = $_GET['id'];
//     // echo "id: $id";
// }

// $act = "";
// if (isset($_GET['act'])) {
//     $act = $_GET['act'];

//     switch ($act) {
//         case "":
//             $dashCtrl = new DashboardController();
//             $dashCtrl->dashboard();
//             break;

//         case "category-list":
//             $cateCtrl = new CategoryController();
//             $cateCtrl->categoryList();
//             break;

//         case "category-create":
//             $cateCtrl = new CategoryController();
//             $cateCtrl->categoryCreate();
//             break;

//         case "category-update":
//             $cateCtrl = new CategoryController();
//             $cateCtrl->categoryUpdate($id);
//             break;

//         case "category-delete":
//             $cateCtrl = new CategoryController();
//             $cateCtrl->categoryDelete($id);
//             break;

//         case "product-list":
//             $proCtrl = new ProductController();
//             $proCtrl->proList();
//             break;

//         case "product-create":
//             $proCtrl = new ProductController();
//             $proCtrl->proCreate();
//             break;

//         case "product-update":
//             $proCtrl = new ProductController();
//             $proCtrl->proUpdate($id);
//             break;

//         case "product-delete":
//             $proCtrl = new ProductController();
//             $proCtrl->proDelete($id);
//             break;

//         case "home":
//             $homeCtrl = new HomeController();
//             $homeCtrl->proList();
//             break;

//         default:
//             include "./resources/views/404.php";
//             break;
//     }
// }

// $pro = new Product();
// var_dump($pro->getAllProduct());
// var_dump($pro->getIdProduct(1));
// var_dump($pro->getAllProduct());
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
