<?php

use App\Controllers\ProductController;
use Bramus\Router\Router;
use App\Models\Product;

$router = new Router();
// Viết route
$router->get('product-list', ProductController::class . '@list');
$router->get('product-create', ProductController::class . '@create');
$router->post('product-store', ProductController::class . '@store');
$router->get('product-update/{id}', ProductController::class . '@update');
$router->post('product-updateStore/{id}', ProductController::class . '@updateStore');
$router->get('product-delete/{id}', ProductController::class . '@delete');
$router->run();
