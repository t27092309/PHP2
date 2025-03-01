@extends('layout_admin')
@section('title', $title)
@section('content')
    <h1>{{ $title }}</h1>
    <button><a href="{{ route('product-create') }}">Create</a></button>
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
                    <td>
                        <img src="{{ storage($product->img_thumbnail) }}" alt="" width="100px">
                    </td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->created_at }}</td>
                    <td>{{ $product->update_at }}</td>
                    <td>
                        <a href="{{ route('product-update/{id}', ['id' => $product->id]) }}">Update</a>
                    </td>
                    <td>
                        <a href="{{ route('product-delete/{id}', ['id' => $product->id]) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
