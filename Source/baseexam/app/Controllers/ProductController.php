<?php

namespace App\Controllers;

use App\Models\Product;

class ProductController extends Controller
{

    public function list()
    {
        $modelProduct = new Product();
        $title = 'Pro list';
        $dataPro = $modelProduct->getAllProduct();
        return $this->views(
            'product.list',
            compact('title', 'dataPro')
        );
    }

    public function create(){
        $title = "Pro create";
        return $this->views(
            'product.create',
            compact('title')
        );
    }

    public function store(){
        $errors = [];
        if(empty($_POST['']))
    }

}
