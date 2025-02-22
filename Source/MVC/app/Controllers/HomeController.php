<?php

namespace App\Controllers;

use App\Models\Home;

class HomeController
{
    // Phương thức
    public $homeQuery;
    public function __construct()
    {
        $this->homeQuery = new Home();
    }

    public function __destruct() {}
    // Hiển thị, thêm, sửa, xóa
    public function proList()
    {
        $home = $this->homeQuery->homeProduct();
        include __DIR__ . '/../../resources/views/public/index.php';
    }

}
