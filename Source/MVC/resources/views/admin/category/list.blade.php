@extends('layout_admin')
@section('title', $title)
@section('content')

    <h1>{{ $title }}</h1>
    <table style="width: auto;" class="table table-striped">
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
        </tr>
        @foreach ($dataCategory as $valueCategory)
            <tr>
                <th>{{ $valueCategory->id_category }}</th>
                <td>{{ $valueCategory->name_category }}</td>
                <td>{{ $valueCategory->description_category }}</td>
                <td>
                    <button type="button" class="btn btn-warning">
                        <a style="text-decoration: none; color:white" href="{{ route('category-edit/{id}', ['id' => $valueCategory->id_category]) }}">Update</a>
                    </button>
                    <button type="button" class="btn btn-danger">
                        <a style="text-decoration: none; color:white" href="{{ route('category-delete/{id}', ['id' => $valueCategory->id_category]) }}">Delete</a>
                    </button>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
