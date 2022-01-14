@extends('layouts.app')

@section('content')
<form method="POST" enctype="multipart/form-data">
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
        <option selected>{{ $family->libelle }}</option>
        @endif
        <option>{{ $family->libelle }}</option>
        @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Continent:</label>
        <select name="continent" class="form-control">
        @foreach($continents as $continent)
        <option>{{ $continent->name }}</option>
        @endforeach
        </select>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-success" value="UPDATE">
    </div>
</form>
@endsection