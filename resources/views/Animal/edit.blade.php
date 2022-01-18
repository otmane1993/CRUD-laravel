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
    <form method="POST" enctype="multipart/form-data" action="{{ route('home.animal.update',$animal->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nom:</label>
            <input type="text" class="form-control" name="name" value="{{ $animal->name }}">
            @error('name')
            <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <input type="text" class="form-control" name="description" value="{{ $animal->description }}">
            @error('description')
            <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <img width="200" height="200" src="{{ Storage::url($animal->image) }}">
            <input type="file" name="image" class="form-control">
            @error('image')
            <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label>Family:</label>
            <select name="family" class="form-control">
            @foreach($families as $family)
            @if($family->libelle===$famili->libelle)
            <option value="{{ $family->id }}" selected>{{ $family->libelle }}</option>
            @else
            <option value="{{ $family->id }}">{{ $family->libelle }}</option>
            @endif
            @endforeach
            </select>
        </div>
        <!-- <div class="form-group">
            <label>Continent:</label>
            <select name="continent" class="form-control">
            @foreach($continents as $continent)
            <option>{{ $continent->name }}</option>
            @endforeach
            </select>
        </div> -->
        <div class="form-group">
            <input type="submit" class="btn btn-success form-control" value="UPDATE">
        </div>
        <div class="form-group">
            <a href="{{ route('home.animal.index') }}" class="btn btn-primary">Retour</a>
        </div>
    </form></div>
@endsection