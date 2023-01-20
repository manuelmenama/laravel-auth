@extends('layouts.app')

@section('title')
| Admin
@endsection

@section('content')

    <div class="container">
        <h1>dashboard</h1>
        <h3>Sono presenti: {{ $project_counter }} progetti</h3>
    </div>

@endsection
