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
            <form class="form" method="POST" action="{{ route('admin.category.update',$category->id) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="name">Name category:</label>
                    <input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror" value="{{ $category->category_name }}">
                    @error('category_name')
                    <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description category:</label>
                    <textarea name="description" class="form-control">{{$category->description}}</textarea>
                    @error('description')
                    <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <img src="{{Storage::url($category->category_image)}}">
                    <input type="file" name="category_image" class="form-control">
                    <!-- @error('category_image')
                    <p>{{ $message }}</p>
                    @enderror -->
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>
            </form>
            <a href="{{ route('admin.category.index') }}" class="btn btn-success">Retour</a>
    </div>
</div>
@endsection