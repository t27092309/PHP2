<?php

use App\Controllers\CategoryController;
use Bramus\Router\Router;
use App\Controllers\ProductController;
use App\Models\Product;

$router = new Router();
// Viết router
// get = hiển thị
// post = thêm
// put = sửa
// delete = xóa

// $router->get('tên router', function(){
// Khối lệnh });
$router->get('/', function () {
    echo 'Đây là trang chủ';
});
// Nhóm
$router->mount('/admin', function () use ($router) {
    $router->get('/', function () {
        echo 'ac';
    });
});
// Tham chiếu sang Controller
// $router->phương thức('tên router', 'namespace\tênclass@phươngthức')  
$router->get('product-list', ProductController::class . '@index');
$router->get('product-create', ProductController::class . '@create');
$router->post('product-store', ProductController::class . '@store');
$router->get('product-edit/{id}', ProductController::class . '@edit');
$router->post('product-update/{id}', ProductController::class . '@update');
$router->get('product-delete/{id}', ProductController::class . '@delete');
$router->get('category-list', CategoryController::class . '@index');
$router->get('category-create', CategoryController::class . '@create');
$router->post('category-store', CategoryController::class . '@store');
$router->get('category-edit/{id}', CategoryController::class . '@edit');
$router->post('category-update/{id}', CategoryController::class . '@update');
$router->get('category-delete/{id}', CategoryController::class . '@delete');
// Truyền id
// $router->get('category-update/{id}', 'App\Controllers\CategoryController@categoryUpdate');

$router->run();
