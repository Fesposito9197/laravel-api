@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Modifica una Tipologia</h1>
    @include('partials.error')
    <form action="{{route('admin.types.update' , $type)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Modifica la Tipologia per il progetto" value="{{old('name' , $type->name)}}">
        </div>
        <button type="submit" class="btn btn-success">Salva</button>
    </form>
</div>
@endsection