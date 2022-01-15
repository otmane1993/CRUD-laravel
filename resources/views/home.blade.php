@extends('layouts.app')

@section('content')
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

@endsection
