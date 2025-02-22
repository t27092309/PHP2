<?php

namespace App\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    // Phương thức
    public $categoryQuery;
    public function __construct()
    {
        $this->categoryQuery = new Category();
    }

    public function __destruct() {}
    // Hiển thị, thêm, sửa, xóa
    public function categoryList()
    {
        $categoryList = $this->categoryQuery->getAllCategory();
        return $this->view('category.list');
        // include __DIR__ . '/../../resources/views/admin/category/list.php';

    }

    public function categoryCreate()
    {
        $category = new Category();
        $tbLoi = "";
        $tbThanhCong = "";

        if (isset($_POST['submitForm'])) {
            // var_dump($_POST);
            $name_category = trim($_POST['name']);
            $description_category = $_POST['description'];
            $categoryCreate = $this->categoryQuery->addCategory(null, $name_category, $description_category);
        }
        include __DIR__ . '/../../resources/views/admin/category/create.php';
    }

    public function categoryUpdate($id)
    {

            $category = new Category();
            // $category = $this->categoryQuery->getIdProduct($id);

            if (isset($_POST['submitForm'])) {
                $category_name = trim($_POST['name']);
                $category_description = $_POST['description'];

                $category->updateCategory($id, $category_name, $category_description);
            }

        include __DIR__ . '/../../resources/views/admin/category/update.php';

    }

    public function categoryDelete($id)
    {
        if ($id !== "") {
            $categoryDelete = $this->categoryQuery->deleteCategory($id);
                header('location:?act=category-list');

        }

        // include __DIR__ . '/../../resources/views/admin/category/list.php';
    }
}
