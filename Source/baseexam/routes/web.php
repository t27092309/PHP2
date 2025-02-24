<?php

use App\Controllers\ProductController;
use Bramus\Router\Router;
use App\Models\Product;

$router = new Router();
// Viết route
$router->get('product-list', ProductController::class . '@list');
$router->get('product-create', ProductController::class . '@create');
$router->run();
