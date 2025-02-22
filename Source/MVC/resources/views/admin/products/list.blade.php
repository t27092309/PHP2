@extends('layout_admin')
@section('title', $title)
@section('content')

    <h1>{{ $title }}</h1>
    <table style="width: auto;" class="table table-striped">
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Image</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
        </tr>
        @foreach ($dataPro as $valuePro)
            <tr>
                <th>{{ $valuePro->id }}</th>
                <td>{{ $valuePro->name }}</td>
                <td>{{ $valuePro->price }}</td>
                <td>
                    <img src="{{ storage($valuePro->image) }}" alt="" width="100px">
                </td>
                <td>{{ $valuePro->description }}</td>
                <td>
                    <button type="button" class="btn btn-warning">
                        <a style="text-decoration: none; color:white" href="{{ route('product-edit/{id}', ['id' => $valuePro->id]) }}">Update</a>
                    </button>
                    <button type="button" class="btn btn-danger">
                        <a style="text-decoration: none; color:white" href="{{ route('product-delete/{id}', ['id' => $valuePro->id]) }}">Delete</a>
                    </button>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
