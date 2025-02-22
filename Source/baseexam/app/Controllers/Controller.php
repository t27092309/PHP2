<?php 
// Khai báo namespace cho class Controller, giúp tổ chức mã nguồn và tránh xung đột tên.
namespace App\Controllers;

// Import thư viện BladeOne để sử dụng template Blade trong PHP mà không cần Laravel.
use eftec\bladeone\BladeOne;

// Define the asset function to resolve asset paths
class Controller {
    /**
     * Phương thức views giúp render một template Blade với dữ liệu truyền vào.
     * 
     * @param string $viewFile Tên file view cần render (không cần đuôi .blade.php)
     * @param array $data Mảng chứa dữ liệu truyền vào view (mặc định là mảng rỗng)
     */
    protected function views($viewFile, $data = []) {
        // Xác định đường dẫn thư mục chứa các file view Blade
        $views = __DIR__ . '/../../resources/views';

        // Xác định đường dẫn thư mục cache để BladeOne lưu trữ các file đã biên dịch
        $cache = __DIR__ . '/../../storage/cache';

        // Khởi tạo đối tượng BladeOne với chế độ debug để dễ dàng phát hiện lỗi
        $blade = new BladeOne($views, $cache, BladeOne::MODE_DEBUG);

        // Thực thi file view với dữ liệu được truyền vào và hiển thị ra trình duyệt
        echo $blade->run($viewFile, $data);
    }
}
?>
