@extends('layouts.app')

@section('title')
| Show
@endsection

@section('content')
    <div class="container my-show-container">

        <h1>show project</h1>
        <h2>{{ $project->name }}</h2>
        <ul>
            <li>
                {{$project->client_name}}
            </li>
        </ul>

        <img src="{{ $project->cover_image }}" alt="{{ $project->name }}">
        <p>
            {{$project->summary}}
        </p>
        <a href="{{ route('admin.project.index') }}" class="btn btn-success">Torna alla lista</a>
    </div>

@endsection
