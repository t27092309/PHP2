<?php
namespace App\Controllers;
class DashboardController{
// Phương thức
// Hiển thị, thêm, sửa, xóa

public function dashboard(){
    include __DIR__.'/../../resources/views/admin/dashboard/list.php';
}
}
?>
