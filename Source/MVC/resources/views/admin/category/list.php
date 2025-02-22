<!DOCTYPE html>
<html>

<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="/MVC/resources/css/admin.css">
    <link rel="stylesheet" href="/MVC/node_modules/bootstrap/dist/css/bootstrap.min.css">

<body>
    <div class="header">
        <nav>
            <a href="?act=home" target="_blank">Về trang web</a>
        </nav>
    </div>
    <div class="container">
        <div class="sidebar">
            <ul>
                <li><a href="?act=">Dashboard</a></li>
                <li><a href="?act=product-list">Products</a></li>
                <li><a class="onvisit" href="?act=category-list">Category</a></li>
                <li><a class="cmenu" href="?act=category-create">Add Category</a></li>
                <li><a class="cmenu" href="#">Edit Category</a></li>
                <li><a href="#news">News</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="#about">About</a></li>
            </ul>
        </div>
        <div class="maincontent">
            <table style="width: auto;" class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categoryList as $category):
                        // var_dump($_POST)
                    ?>
                        <tr>
                            <th scope="row"><?= $category->id_category ?></th>
                            <td><?= $category->name_category ?></td>
                            <td><?= $category->description_category ?></td>
                            <td><button type="button" class="btn btn-danger">
                                    <a style="text-decoration: none; color:white" href="?act=category-delete&id=<?= $category->id_category ?>">Delete</a>
                                </button>
                                <button type="button" class="btn btn-warning">
                                    <a style="text-decoration: none; color:white" href="?act=category-update&id=<?= $category->id_category ?>">Update</a>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <div class="footer">
            <p>&copy; 2023 My Company</p>
        </div>
    </div>

</body>

</html>