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
    <form action="{{ route('category-store') }}" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="category_name" class="form-label">Name:</label>
            <input type="text" class="form-control" name="category_name">
        </div>
        <div class="mb-3">
            <label for="category_description" class="form-label">Description:</label>
            <input type="text" class="form-control" name= "category_description">
        </div>
        <div>
            <button type="submit" class="btn btn-success">Create</button>
        </div>
    </form>
@endsection
