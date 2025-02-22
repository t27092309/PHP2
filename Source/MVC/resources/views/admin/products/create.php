<!DOCTYPE html>
<html>

<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="/MVC/resources/css/admin.css">
    <link rel="stylesheet" href="/MVC/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script>
        import '/MVC/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js';
    </script>

<body>
    <div class="header">
        <nav>
            <a href="#">Admin</a>
        </nav>
    </div>
    <div class="container">
        <div class="sidebar">
            <ul>
                <li><a href="?act=">Dashboard</a></li>
                <li class="fmenu"><a class="onvisit" href="?act=product-list">Products</a></li>
                <li><a class="cmenu convisit" href="#">Add Product</a></li>
                <li><a class="cmenu" href="#">Edit Product</a></li>
                <li><a href="?act=category-list">Category</a></li>
                <li><a href="#news">News</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="#about">About</a></li>
            </ul>
        </div>
        <div class="maincontent">
            <h2>Products</h2>
            <!-- <?php
             echo "$pro_name";
              ?> -->


            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Tên sản phẩm: </label>
                    <input type="text" class="form-control" name="name" placeholder="VD: Đi Theo Chân Bác">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Giá bán: </label>
                    <input class="form-control" type="number" name="price" multiple>
                </div>
                <div class="mb-3">
                    <label for="img" class="form-label">Đường dẫn ảnh:</label>
                    <input class="form-control" type="text" name="img_src">
                    <input type="file" name="file_upload">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Mô tả:</label>
                    <input class="form-control" type="text" name="description" rows="3">
                </div>
                <button type="submit" name="submitForm" class="btn btn-success">Tạo mới</button>
            </form>
        </div>
        <div class="footer">
            <p>&copy; 2023 My Company</p>
        </div>
    </div>

</body>

</html>