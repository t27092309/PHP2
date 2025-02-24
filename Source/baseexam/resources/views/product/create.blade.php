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
            <label for=""></label>
            <input type="text" name="" id="">
        </div>
        <div class="mb-3">
            <label for=""></label>
            <input type="text" name="" id="">
        </div>
        <div class="mb-3">
            <label for=""></label>
            <input type="text" name="" id="">
        </div>
        <div class="mb-3">
            <label for=""></label>
            <input type="text" name="" id="">
        </div>
        <div class="mb-3">
            <label for=""></label>
            <input type="text" name="" id="">
        </div>
        <div class="mb-3">
            <label for=""></label>
            <input type="text" name="" id="">
        </div>

    </form>

@endsection
