<!DOCTYPE html>
<html>

<head>
    <title>Cửa hàng sách online</title>
    <link rel="stylesheet" href="/MVC/resources/css/home.css">
    <link rel="stylesheet" href="/MVC/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script>
        import '/MVC/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js';
    </script>
</head>

<body>
    <header>
        <h1>Cửa hàng sách</h1>
        <nav>
            <ul>
                <li><a href="#">Trang chủ</a></li>
                <li><a href="#">Sách mới</a></li>
                <li><a href="#">Liên hệ</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Sách bán chạy</h2>
        <div class="product-list">
            <?php foreach ($home as $product): ?>
                <div class="product">
                    <img src="book1.jpg" alt="Sách 1">
                    <h3><?= $product->name ?></h3>
                    <p><?= $product->price ?></p>
                    <p><?= $product->description ?></p>
                </div>
            <?php endforeach ?>
        </div>
    </main>

    <footer>
        <p>&copy; 2023 Cửa hàng sách online</p>
    </footer>

</body>

</html>