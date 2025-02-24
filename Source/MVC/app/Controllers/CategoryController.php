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
    public function index()
    {
        $modelCategory = new Category();
        $title = 'Category list';
        $dataCategory = $modelCategory->getAllCategory();
        // var_dump($dataPro);
        return $this->view(
            'category.list',
            compact('title', 'dataCategory')
        );
    }
    // Form them
    public function create()
    {
        $title = 'Thêm danh mục';
        return $this->view(
            'category.create',
            compact('title')
        );
    }

    public function store()
    {
        // var_dump($_POST);
        // Validate
        $errors = [];
        if (empty($_POST['category_name'])) {
            $errors[] = 'Tên không được để trống';
        }
        // Hiển thị lỗi
        if (count($errors) > 0) {
            flash('errors', $errors, 'category-create');
        } else {
            // Nếu ko có lỗi -> thực hiện thêm vào CSDL
            $modelCategory = new Category();
            $result = $modelCategory->addCategory(
                null,
                $_POST['category_name'],
                $_POST['category_description'],
            );
            if ($result) {
                flash('success', 'Add category successfully', 'category-create');
            } else {
                flash('errors', 'Add category failed', 'category-create');
            }
        }
    }

    public function edit($id_category)
    {
        $title = 'Chỉnh sửa danh mục';
        $modelCategory = new Category();
        $data = $modelCategory->getIdCategory($id_category);
        // var_dump($data);
        return $this->view(
            'category.edit',
            compact('title', 'data')
        );
    }

    public function update($id_category)
    {
        $modelCategory = new Category();
        // var_dump($_POST);
        // Validate
        $errors = [];
        if (empty($_POST['category_name'])) {
            $errors[] = 'Tên không được để trống';
        }        
        // Hiển thị lỗi
        if (count($errors) > 0) {
            flash('errors', $errors, 'category-add');
        } else {
            // Nếu ko có lỗi -> thực hiện thêm vào CSDL
            $modelCategory = new Category();
            $result = $modelCategory->updateCategory(
                $id_category,
                $_POST['category_name'],
                $_POST['category_description'],

            );
            if ($result) {
                flash('success', 'Edit category successfully', 'category-list');
            } else {
                flash('errors', 'Edit category failed', 'category-edit/' . $id_category);
            }
        }
    }

    public function delete($id_category){
        $modelCategory = new Category();
        $result = $modelCategory->deleteCategory($id_category);
        if($result){
            flash('success', 
            'Xóa danh mục thành công', 
            'category-list'
        );
       
        }else{
            flash('errors', 
            'Có lỗi xảy ra khi xóa danh mục', 
            'category-list'
        );
        }
     }

    // public function categoryCreate()
    // {
    //     $category = new Category();
    //     $tbLoi = "";
    //     $tbThanhCong = "";

    //     if (isset($_POST['submitForm'])) {
    //         // var_dump($_POST);
    //         $name_category = trim($_POST['name']);
    //         $description_category = $_POST['description'];
    //         $categoryCreate = $this->categoryQuery->addCategory(null, $name_category, $description_category);
    //     }
    //     include __DIR__ . '/../../resources/views/admin/category/create.php';
    // }

    // public function categoryUpdate($id)
    // {

    //         $category = new Category();
    //         // $category = $this->categoryQuery->getIdProduct($id);

    //         if (isset($_POST['submitForm'])) {
    //             $category_name = trim($_POST['name']);
    //             $category_description = $_POST['description'];

    //             $category->updateCategory($id, $category_name, $category_description);
    //         }

    //     include __DIR__ . '/../../resources/views/admin/category/update.php';

    // }

    // public function categoryDelete($id)
    // {
    //     if ($id !== "") {
    //         $categoryDelete = $this->categoryQuery->deleteCategory($id);
    //             header('location:?act=category-list');

    //     }

    //     // include __DIR__ . '/../../resources/views/admin/category/list.php';
    // }
}
