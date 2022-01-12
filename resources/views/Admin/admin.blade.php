@extends('layouts.app')

@section('content')
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
@endsection