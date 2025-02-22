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
    <form action="{{ route('product-update/{id}', ['id' => $data->id]) }}" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="pro_name" class="form-label">Name:</label>
            <input type="text" class="form-control" name="pro_name" value="{{$data->name}}">
        </div>
        <div class="mb-3">
            <label for="pro_price" class="form-label">Price:</label>
            <input type="number" class="form-control" name="pro_price"  value="{{$data->price}}">
        </div>
        <div class="mb-3">
            <label for="pro_image" class="form-label">Image:</label>
            <input type="file" class="form-control" name="pro_image"  value="{{$data->image}}">
        </div>
        <div class="mb-3">
            <label for="pro_description" class="form-label">Description:</label>
            <input type="text" class="form-control" name="pro_description"  value="{{$data->description}}">
        </div>
        <div>
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    </form>
@endsection
