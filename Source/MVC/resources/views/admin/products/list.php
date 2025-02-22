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
            <a href="?act=home" target="_blank">Về trang web</a>
        </nav>
    </div>
    <div class="container">
        <div class="sidebar">
            <ul>
                <li><a href="?act=">Dashboard</a></li>
                <li class="fmenu"><a class="onvisit" href="?act=product-list">Products</a></li>
                <li><a class="cmenu" href="?act=product-create">Add Product</a></li>
                <li><a class="cmenu" href="#">Edit Product</a></li>
                <li><a href="?act=category-list">Category</a></li>
                <li><a href="#news">News</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="#about">About</a></li>
            </ul>
        </div>
        <div class="maincontent">
            <h2>Products</h2>
            <table style="width: auto;" class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Description</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($proList as $product): ?>
                        <tr>
                            <th scope="row"><?= $product->id ?></th>
                            <td><?= $product->name ?></td>
                            <td><?= $product->price ?></td>
                            <td><img src="<?= $product->img ?>" alt=""></td>
                            <td><?= $product->description ?></td>
                            <td><button type="button" class="btn btn-danger">
                                    <a style="text-decoration: none; color:white" href="?act=product-delete&id=<?= $product->id ?>">Delete</a>
                                </button>
                                <button type="button" class="btn btn-warning">
                                    <a style="text-decoration: none; color:white" href="?act=product-update&id=<?= $product->id ?>">Update</a>
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