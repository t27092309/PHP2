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
                <li><a class="onvisit" href="#home">Dashboard</a></li>
                <li class="collapsible"><a href="?act=product-list">Products</a></li>
                <li><a href="?act=category-list">Category</a></li>
                <li><a href="#news">News</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="#about">About</a></li>
            </ul>
        </div>
        <div class="maincontent">
            <h2>Welcome to Admin Panel</h2>
            <p>This is the main content area.</p>
        </div>
        <div class="footer">
            <p>&copy; 2023 My Company</p>
        </div>
    </div>

</body>

</html>