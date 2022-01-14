@extends('layouts.app')

@section('content')
<div style="width:70%;">
    <div>
        <a href="{{ route('home.animal.create') }}" class="btn btn-primary">Create Animal<i class="fas fa-plus"></i>:</a>
    </div>
    <div>
        <table class="table table-striped table-bordered">
            <thead>
                <th>Numero:</th>
                <th>Nom:</th>
                <th>Description:</th>
                <th>Image:</th>
                <th>Actions:</th>
            </thead>
            <tbody>
                @foreach($animals as $animal)
                <tr>
                    <td>{{ $animal->id }}</td>
                    <td>{{ $animal->name }}</td>
                    <td>{{ $animal->description }}</td>
                    <td>
                        <img width="60" height="60" src="{{ Storage::url($animal->image) }}" alt="">
                    </td>
                    <td>
                        <a href="" class="btn btn-warning">Edit</a>
                        <a href="" class="btn btn-success">Show</a>
                        <!-- <a href="{{ route('home.animal.delete') }}" class="btn btn-danger">Delete</a> -->
                        <form method="POST" action="{{ route('home.animal.delete',$animal->id) }}">
                            <input type="submit" class="btn btn-danger" value="DELETE">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection