@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Projects</h1>

        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Cerca
                </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                </div>
            </div>
        </div>


        @if (session('deleted'))

        <div class="alert alert-success">
            {{session('deleted')}}
        </div>
        @endif

        <table class="table">
            <thead>
              <tr>
                <th scope="col"><a href="{{ route('admin.projects.orderby', ['id', $direction]) }}">#</a></th>
                <th scope="col"><a href="{{ route('admin.projects.orderby', ['name', $direction]) }}">Project Name</a></th>
                <th scope="col"><a href="{{ route('admin.projects.orderby', ['client_name', $direction]) }}">Client</a></th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{$project->id}}</td>
                        <td>{{$project->name}}</td>
                        <td>{{$project->client_name}}</td>
                        <td class="d-flex">
                            <a href="{{ route('admin.project.show', $project) }}" class="btn btn-primary me-2"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('admin.project.edit', $project) }}" class="btn btn-warning me-2"><i class="fa-solid fa-pencil"></i></a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal{{$project->id}}">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                            {{-- Button delete manda questo modal --}}
                            @include('admin.partials.confirm-delete')
                        </td>
                    </tr>


                @endforeach
            </tbody>
          </table>
          {{$projects->links()}}
    </div>

@endsection
