@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Projects</h1>

        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Project Name</th>
                <th scope="col">Client</th>
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
    </div>

@endsection
