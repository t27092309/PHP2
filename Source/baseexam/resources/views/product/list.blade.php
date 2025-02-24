@extends('layout_admin')
@section('title', $title)
@section('content')
    <h1>{{ $title }}</h1>
    <table class="table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Category ID</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Description</th>
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataPro as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->category_id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->img_thumbnail }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->created_at }}</td>
                    <td>{{ $product->update_at }}</td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
