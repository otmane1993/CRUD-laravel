@extends('layouts.app')

@section('content')
<div class="categories-create">
    
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
        <div>
            <div>
                <h3>Nom category:</h3>
                <p>{{ $category->category_name }}</p>
            </div>
            <div>
                <h3>Description:</h3>
                <p>{{ $category->description }}</p>
            </div>
            <div>
                <h3>Image:</h3>
                <img width="200" height="200" src="{{ Storage::url($category->category_image) }}">
            </div>
            <div>
                <h3>Le nombre produit:</h3>
                <p>{{ $products->count() }}</p>
                <h3>Products:</h3>
                @foreach($products as $product)
                <p>{{ $product->product_name }}</p>
                @endforeach
            </div>
            <div>
                <a class="btn btn-success" href="{{ route('admin.category.index') }}">Retour</a>
            </div>
        </div>
    
</div>
@endsection