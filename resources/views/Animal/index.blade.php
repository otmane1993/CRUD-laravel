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
                            <a href="{{ route('home.animal.edit',$animal->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('home.animal.show',$animal->id) }}" class="btn btn-success">Show</a>
                            

                            <form method="POST" action="{{ route('home.animal.delete',$animal->id)}}" id="form">
                            @csrf
                            @method('DELETE')

                            <input type="submit" class="btn btn-danger" value="delete" class="delete" />

                            </form>

                            
                            <!-- <form method="POST" action="{{ route('home.animal.delete',[$animal->id,$animal->name]) }}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="DELETE">
                            </form> -->
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @if(Session::has('message'))
    <p>{{Session::get('message')}}</p>
    @endif
</div></div>
<script>
    let input=document.querySelectorAll('.delete');
    input.forEach(element=>{
        element.addEventListener('click',function(e){
        let res=confirm('Do you really want to delete this animal?');
        if(!res)
        {
            e.preventDefault();
        }
        });
    });
    
</script>
@endsection