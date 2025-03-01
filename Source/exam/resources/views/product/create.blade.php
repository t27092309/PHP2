@extends('layout_admin')
@section('title', $title)
@section('content')
    <h1>{{ $title }}</h1>
    @if (isset($_SESSION['errors']) && isset($_GET['msg']))
        <div>
            <ul>
                @foreach ($_SESSION['errors'] as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (isset($_SESSION['success']) && isset($_GET['msg']))
        <div>{{ $_SESSION['success'] }}</div>
    @endif

    <form action="{{ route('product-store') }}" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="category_id">category_id</label>
            <input type="text" name="category_id" id="">
        </div>
        <div class="mb-3">
            <label for="name">name</label>
            <input type="text" name="name" id="">
        </div>
        <div class="mb-3">
            <label for="img_thumbnail">img_thumbnail</label>
            <input type="file" name="img_thumbnail" id="">
        </div>
        <div class="mb-3">
            <label for="description">description</label>
            <input type="text" name="description" id="">
        </div>
        <div class="mb-3">
            <label for="created_at">created_at</label>
            <input type="date" name="created_at" id="">
        </div>
        <div class="mb-3">
            <button type="submit">Create</button>
        </div>

    </form>

@endsection
