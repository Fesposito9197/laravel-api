@extends('layouts.admin')

@section('content')
<div class="container mt-3">
    <div class="d-flex align-items-center">
        <h1>Lista Tipologia</h1>
        <a href="{{route('admin.technologies.create')}}" class="btn btn-success  ms-3"><i class="fa-regular fa-square-plus fa-lg fa-fw"></i></a>
    </div>
      @include('partials.message')
    <table class="table ">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Slug</th>
            <th scope="col">Azioni</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($technologies as $technology)
            <tr>
              <td>{{$technology->id}}</td>
              <td>{{$technology->name}}</td>
              <td>{{$technology->slug}}</td>
              <td class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    More
                </button>
                <ul class="dropdown-menu">
                  <li>
                      <a href="{{route('admin.technologies.show' , $technology)}}" class="dropdown-item" >info</a>
                  </li>
                  <li>
                      <a href="{{route('admin.technologies.edit' , $technology)}}" class="dropdown-item">modifica</a>
                  </li>
                </ul>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger ms-2" data-bs-toggle="modal" data-bs-target="#modal-{{$technology->id}}">
                  <i class="fa-solid fa-dumpster "></i>
                </button>
              </td>
            </tr>
            <!-- Modal -->
            <div class="modal fade" id="modal-{{$technology->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Conferma</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    Sicuro di voler eliminare la tipologia {{$technology->name}}?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form action="{{route('admin.technologies.destroy' , $technology)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Si! Elimina</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </tbody>
    </table>
</div>
@endsection