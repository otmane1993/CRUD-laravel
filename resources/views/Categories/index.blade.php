@extends('layouts.app')

@section('content')
<div class="categories-index">
    <div>
        <nav class="navbare navbar-inverse d-flex flex-column">
            <div class="container-nav">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Ecommerce</a>
                </div>
                <ul class="nav navbar-nav nav-dash">
                    <li class="active"><a href="#">Products</a></li>
                    <li><a href="{{ route('admin.category.index') }}">Categories</a></li>
                    <li><a href="#">Page 2</a></li>
                    <li><a href="#">Page 3</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="table-categories">
        <div>
            <a class="btn btn-primary" href="{{route('admin.category.create')}}">Create Category</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Numero:</th>
                    <th>Nom:</th>
                    <th>Description:</th>
                    <th>Image</th>
                    <th>Actions:</th>
                </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->category_name }}</td>
                    <td>{{ $category->description }}</td>
                    <td><img src="{{ $category->category_image }}"></td>
                    <td>
                        <a class="btn btn-success" href="">Update</a>
                        <a class="btn btn-warning" href="">Show</a>
                        <a class="btn btn-danger" href="">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @if(Session::has('message'))
        <p>{{ Session::get('message') }}</p>
        @endif
    </div>
</div>
@endsection