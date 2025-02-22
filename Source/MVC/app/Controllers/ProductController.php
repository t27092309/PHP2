<?php

namespace App\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    // Phương thứ
    // Hiển thị, thêm, sửa, xóa
    public function index()
    {
        $modelProduct = new Product();
        $title = 'Pro list';
        $dataPro = $modelProduct->getAllProduct();
        // var_dump($dataPro);
        return $this->view(
            'products.list',
            compact('title', 'dataPro')
        );
    }
    // Form them
    public function create()
    {
        $title = 'Thêm sản phẩm';
        return $this->view(
            'products.create',
            compact('title')
        );
    }

    public function store()
    {
        // var_dump($_POST);
        // Validate
        $errors = [];
        if (empty($_POST['pro_name'])) {
            $errors[] = 'Tên không được để trống';
        }
        if (empty($_POST['pro_price'])) {
            $errors[] = 'Giá không được để trống';
        }
        // if(empty($_POST['pro_image']['name'])){
        //     $errors[] = 'Hình ảnh không được để trống';
        // }
        if (empty($_POST['pro_description'])) {
            $errors[] = 'Mô tả không được để trống';
        }
        // Kiếm tra và xử lý hình ảnh
        if (isset($_FILES['pro_image']) && $_FILES['pro_image']['error'] == 0) {
            // Lấy đường dẫn vào nơi lưu trữ hình ảnh
            $targetDir = __DIR__ . "/../../storage/upload/";
            // Các định dạng cho upload
            $allowTypes = ['jpg', 'png', 'jpeg', 'gif'];
            // Dung lượng tối đa 
            $maxSize = 2 * 1024 * 1024; //2MB
            // Lấy thông tin hình ảnh
            $fileName = basename($_FILES['pro_image']['name']);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            $fileTmpName = $_FILES['pro_image']['tmp_name'];
            // Kiểm tra định dạng hình ảnh
            if (!in_array($fileType, $allowTypes)) {
                $errors[] = 'Chỉ được upload file định dạng JPG, PNG, JPEG, GIF';
            }
            // Kiểm tra dung lượng hình ảnh
            if ($_FILES['pro_image']['size'] > $maxSize) {
                $errors[] = 'Dung lượng hình ảnh không được vượt quá 2MB';
            }
            // Thực hiện upload ảnh
            $newFileName = time() . '_' . $fileName;
            $imagePath = $targetDir . $newFileName;
            // Tiến hành upload
            if (!move_uploaded_file($fileTmpName, $imagePath)) {
                $errors[] = 'Lỗi upload hình ảnh';
            }
            // Kiểm tra hình ảnh vừa upload có tồn tại ko
            if (!file_exists($imagePath)) {
                $errors[] = 'Lỗi upload hình ảnh';
            }
        }
        // Hiển thị lỗi
        if (count($errors) > 0) {
            flash('errors', $errors, 'product-create');
        } else {
            // Nếu ko có lỗi -> thực hiện thêm vào CSDL
            $modelProduct = new Product();
            $result = $modelProduct->addProduct(
                null,
                $_POST['pro_name'],
                $_POST['pro_price'],
                $_POST['pro_description'],
                $newFileName
            );
            if ($result) {
                flash('success', 'Add product successfully', 'product-create');
            } else {
                flash('errors', 'Add product failed', 'product-create');
            }
        }
    }

    public function edit($id)
    {
        $title = 'Chỉnh sửa sản phẩm';
        $modelProduct = new Product();
        $data = $modelProduct->getIdProduct($id);
        return $this->view(
            'products.edit',
            compact('title', 'data')
        );
    }

    public function update($id)
    {
        $modelProduct = new Product();
        $imageData = $modelProduct->getIdProduct($id)->image;
        // Lấy đường dẫn vào nơi trữ hình ảnh
        $targetDir =  __DIR__ . "/../../storage/uploads/";
        // var_dump($_POST);
        // Validate
        $errors = [];
        if (empty($_POST['pro_name'])) {
            $errors[] = 'Tên không được để trống';
        }
        if (empty($_POST['pro_price'])) {
            $errors[] = 'Giá không được để trống';
        }
        // if(empty($_POST['pro_image']['name'])){
        //     $errors[] = 'Hình ảnh không được để trống';
        // }
        if (empty($_POST['pro_description'])) {
            $errors[] = 'Mô tả không được để trống';
        }
        // Kiếm tra và xử lý hình ảnh
        if (isset($_FILES['pro_image']) && $_FILES['pro_image']['error'] == 0) {
            // Lấy đường dẫn vào nơi lưu trữ hình ảnh
            $targetDir = __DIR__ . "/../../storage/upload/";
            // Các định dạng cho upload
            $allowTypes = ['jpg', 'png', 'jpeg', 'gif'];
            // Dung lượng tối đa 
            $maxSize = 2 * 1024 * 1024; //2MB
            // Lấy thông tin hình ảnh
            $fileName = basename($_FILES['pro_image']['name']);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            $fileTmpName = $_FILES['pro_image']['tmp_name'];
            // Kiểm tra định dạng hình ảnh
            if (!in_array($fileType, $allowTypes)) {
                $errors[] = 'Chỉ được upload file định dạng JPG, PNG, JPEG, GIF';
            }
            // Kiểm tra dung lượng hình ảnh
            if ($_FILES['pro_image']['size'] > $maxSize) {
                $errors[] = 'Dung lượng hình ảnh không được vượt quá 2MB';
            }
            // Thực hiện upload ảnh
            $newFileName = time() . '_' . $fileName;
            $imagePath = $targetDir . $newFileName;
            // Tiến hành upload
            if (!move_uploaded_file($fileTmpName, $imagePath)) {
                $errors[] = 'Lỗi upload hình ảnh';
            }
            // Kiểm tra hình ảnh vừa upload có tồn tại ko
            if (!file_exists($imagePath)) {
                $errors[] = 'Lỗi upload hình ảnh';
            }
        }else{
            $newFileName = $imageData;
        }
        // Hiển thị lỗi
        if (count($errors) > 0) {
            flash('errors', $errors, 'product-add');
        } else {
            // Nếu ko có lỗi -> thực hiện thêm vào CSDL
            $modelProduct = new Product();
            $result = $modelProduct->updateProduct(
                $id,
                $_POST['pro_name'],
                $_POST['pro_price'],
                $_POST['pro_description'],
                $newFileName
            );
            if ($result) {
                if ($newFileName != $imageData && file_exists($targetDir . $imageData)) {
                    unlink($targetDir . $imageData);
                }
                flash('success', 'Edit product successfully', 'product-list');
            } else {
                flash('errors', 'Edit product failed', 'product-edit/' . $id);
            }
        }
    }

    public function delete($id){
        $modelProduct = new Product();
        $imageData = $modelProduct->getIdProduct($id)->image;
        $result = $modelProduct->deleteProduct($id);
        $targetDir =  __DIR__."/../../storage/uploads/";
        if($result){
            // Xóa hình nếu có upload ảnh mới
            if(file_exists($targetDir.$imageData)){
               unlink($targetDir.$imageData);
            }
            flash('success', 
            'Xóa sản phẩm thành công', 
            'product-list'
        );
       
        }else{
            flash('errors', 
            'Có lỗi xảy ra khi xóa sản phẩm', 
            'product-list'
        );
        }
     }
    //     public function proList()
    //     {
    //         $proList = $this->productQuery->getAllProduct();
    //         include __DIR__ . '/../../resources/views/admin/products/list.php';
    //     }

    //     public function proCreate()
    //     {
    //         $product = new Product();
    //         $tbLoi = "";
    //         $tbThanhCong = "";

    //         if (isset($_POST['submitForm'])) {
    //             // var_dump($_POST);
    //             $pro_name = trim($_POST['name']);
    //             $pro_price = $_POST['price'];
    //             $pro_description = $_POST['description'];
    //             $img_src = trim($_POST['img_src']);
    //             // var_dump($_FILES);

    //             $thamso1 = $_FILES["file_upload"]["tmp_name"];
    //             $thamso2 = "/../upload/" . $_FILES['file_upload']["name"];
    //             if (move_uploaded_file($thamso1, $thamso2)) {
    //                 $img_src = "/../upload/" . $_FILES['file_upload']['name'];
    //             }

    //             $proCreate = $this->productQuery->addProduct(null, $pro_name, $pro_price, $pro_description, $img_src);
    //         }
    //         include __DIR__ . '/../../resources/views/admin/products/create.php';
    //     }

    //     public function proUpdate($id)
    //     {

    //         $product = new Product();
    //         // $product = $this->productQuery->getIdProduct($id);

    //         if (isset($_POST['submitForm'])) {
    //             $pro_name = trim($_POST['name']);
    //             $pro_price = $_POST['price'];
    //             $pro_description = $_POST['description'];
    //             $pro_img = $_POST['img'];

    //             $product->updateProduct($id, $pro_name, $pro_price, $pro_description, $pro_img);
    //         }

    //         include __DIR__ . '/../../resources/views/admin/products/update.php';
    //     }

    //     public function proDelete($id)
    //     {
    //         if ($id !== "") {
    //             $proDelete = $this->productQuery->deleteProduct($id);
    //             header('location:?act=product-list');
    //         }

    //         // include __DIR__ . '/../../resources/views/admin/products/list.php';
    //     }
}
