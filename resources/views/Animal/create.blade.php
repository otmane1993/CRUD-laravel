@extends('layouts.app')

@section('content')
<div class="dashboard d-flex justify-content-around">
    <nav class="nav-dashboard">
        <ul>
            <li>
                <a href="{{ route('home.animal.index') }}">Animals:</a>
            </li>
            <li>
                <a href="">Continents:</a>
            </li>
            <li>
                <a href="">Families:</a>
            </li>
        </ul>
    </nav>
    <form method="POST" action="{{ route('home.animal.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nom:</label>
            <input type="text" name="name" class="form-control">
            @error('name')
            <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" class="form-control"></textarea>
            @error('description')
            <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <select class="form-control" name="family">
                @foreach($families as $family)
                <option  value="{{ $family->id }}">{{ $family->libelle }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <select class="form-control" name="continent">
                @foreach($continents as $continent)
                <option value="{{ $continent->id }}">{{ $continent->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" name="image" class="form-control">
            @error('image')
            <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <input type="submit" value="create" class="btn btn-success form-control">
        </div>
        <div class="form-group">
            <a href="{{ route('home.animal.index') }}" class="btn btn-primary">Retour</a>
        </div>
    </form></div>
@endsection