@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Projects</h1>

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
                        <td>
                            <a href="{{ route('admin.project.show', $project) }}" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
                        </td>
                    </tr>

                @endforeach
            </tbody>
          </table>
          {{$projects->links()}}
    </div>

@endsection
