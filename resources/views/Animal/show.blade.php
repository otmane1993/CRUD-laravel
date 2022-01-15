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
                <div>
                    <div>
                        <h3>Nom de l'animal:</h3>
                        <p>{{$animal->name}}</p>
                    </div>
                    <div>
                        <h3>Description:</h3>
                        <p>{{$animal->description}}</p>
                    </div>
                    <div>
                        <h3>Family de l'animal:</h3>
                        <p>{{$family->libelle}}</p>
                    </div>
                    <div>
                        <img width="200" height="200" src="{{ Storage::url($animal->image) }}">
                    </div>
                    <div>
                        <a href="{{ route('home.animal.index') }}" class="btn btn-success">Retour</a>
                    </div>
                </div>
</div>
@endsection