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
        // var_dump($dataPro);
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
        if(empty($_POST['category_id'])){
            $errors[] = "Category id ko dc de trong";
        }
        if(empty($_POST['name'])){
            $errors[] = "name ko dc de trong";
        }
        if(empty($_POST['description'])){
            $errors[] = "description ko dc de trong";
        }
        if(empty($_POST['created_at'])){
            $errors[] = "created_at ko dc de trong";
        }

        if(isset($_FILES['img_thumbnail']) && $_FILES['img_thumbnail']['error'] == 0){
            $targetDir = __DIR__ . "/../../storage/uploads/";
            $allowTypes = ['jpg', 'png', 'jpeg', 'gif'];
            $maxSize = 2 * 1024 * 1024;
            $fileName = basename($_FILES['img_thumbnail']['name']);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            $fileTmpName = $_FILES['img_thumbnail']['tmp_name'];
            if(!in_array($fileType, $allowTypes)){
                $errors[] = 'Chỉ được upload file định dạng JPG, PNG, JPEG, GIF';
            }
            if($_FILES['img_thumbnail']['size'] > $maxSize){
                $errors[] = 'Dung lượng không được vượt quá 2MB';
            }
            $newFileName = time() . '_' . $fileName;
            $imagePath = $targetDir . $newFileName;

            if(!move_uploaded_file($fileTmpName, $imagePath)){
                $errors[] = "Loi upload hinh anh";
            }
            if(!file_exists($imagePath)){
                $errors[] = 'Loi upload hinh anh';
            }
        }
        if(count($errors) > 0){
            flash('errors', $errors, 'product-create');
        }else{
            $modelProduct = new Product();
            $result = $modelProduct->addProduct(
                null,
                $_POST['category_id'],
                $_POST['name'],
                $newFileName,
                $_POST['description'],
                $_POST['created_at'],
                null      
            );
            if($result){
                flash('success', 'Add product successfully', 'product-create');
            }else{
                flash('error', 'Add product failed', 'product-create');
            }

        }
    }

    public function update($id){
        $title = 'Update product';
        $modelProduct = new Product();
        $data = $modelProduct->getProduct($id);
        return $this->views(
            'product.update',
            compact('title', 'data')
        );
    }

    public function updateStore($id){
        $modelProduct = new Product();
        $imageData = $modelProduct->getProduct($id)->img_thumbnail;
        $targetDir = __DIR__ . "/../../storage/uploads/";

        $errors = [];
        if(empty($_POST['category_id'])){
            $errors[] = "Category id ko dc de trong";
        }
        if(empty($_POST['name'])){
            $errors[] = "name ko dc de trong";
        }
        if(empty($_POST['description'])){
            $errors[] = "description ko dc de trong";
        }
        if(empty($_POST['updated_at'])){
            $errors[] = "updated_at ko dc de trong";
        }

        if(isset($_FILES['img_thumbnail']) && $_FILES['img_thumbnail']['error'] == 0){
            $targetDir = __DIR__ . "/../../storage/uploads/";
            $allowTypes = ['jpg', 'png', 'jpeg', 'gif'];
            $maxSize = 2 * 1024 * 1024;
            $fileName = basename($_FILES['img_thumbnail']['name']);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            $fileTmpName = $_FILES['img_thumbnail']['tmp_name'];
            if(!in_array($fileType, $allowTypes)){
                $errors[] = 'Chỉ được upload file định dạng JPG, PNG, JPEG, GIF';
            }
            if($_FILES['img_thumbnail']['size'] > $maxSize){
                $errors[] = 'Dung lượng không được vượt quá 2MB';
            }
            $newFileName = time() . '_' . $fileName;
            $imagePath = $targetDir . $newFileName;

            if(!move_uploaded_file($fileTmpName, $imagePath)){
                $errors[] = "Loi upload hinh anh";
            }
            if(!file_exists($imagePath)){
                $errors[] = 'Loi upload hinh anh';
            }
        }else{
            $newFileName = $imageData;
        }
        if(count($errors) > 0){
            flash('errors', $errors, 'product-update/' .$id);
        }else{
            $modelProduct = new Product();
            $result = $modelProduct->updateProduct(
                $id,
                $_POST['category_id'],
                $_POST['name'],
                $newFileName,
                $_POST['description'],
                $_POST['updated_at']                
            );
            if($result){
                if($newFileName != $imageData && file_exists($targetDir . $imageData)){
                    unlink($targetDir . $imageData);
                }
                flash('success', 'Update product successfully', 'product-list');
            }else{
                flash('error', 'Update product failed', 'product-update/' .$id);
            }

        }   
    }

    public function delete($id){
        $modelProduct = new Product();
        $imageData = $modelProduct->getProduct($id)->img_thumbnail;
        $result = $modelProduct->deleteProduct($id);
        $targetDir = __DIR__ . "/../../storage/uploads/";
        if($result){
            if(file_exists($targetDir.$imageData)){
                unlink($targetDir.$imageData);
            }
            flash('success', 'Delete product successfully', 'product-list');
        }else{
            flash('errors', 'Delete product failed', 'product-list');
        };
    }

}
