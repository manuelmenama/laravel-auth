@extends('layouts.app')

@section('title')
| Show
@endsection

@section('content')
    <div class="container my-show-container">

        <h1>show project</h1>
        @if (session('message'))

        <div class="alert alert-success">
            {{session('message')}}
        </div>
        @endif
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
        <a href="{{ route('admin.project.edit', $project) }}" class="btn btn-warning"><i class="fa-solid fa-pencil"></i></a>
    </div>

@endsection
