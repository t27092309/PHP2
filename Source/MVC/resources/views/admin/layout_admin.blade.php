<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/MVC/resources/css/admin.css">
    <link rel="stylesheet" href="/MVC/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <ul>
                <li><a href="?act=">Dashboard</a></li>
                <li><a href="{{ route('product-list')}}">Products</a></li>
                <li><a class="cmenu" href="{{ route('product-create')}}">Add Product</a></li>
                <li><a href="{{ route('category-list')}}">Category</a></li>
                <li><a class="cmenu" href="{{ route('category-create')}}">Add Category</a></li>
                <li><a href="#news">News</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="#about">About</a></li>
            </ul>
        </div>
        <div class="maincontent">
            @yield('content')
        </div>
    </div>

</body>

</html>
