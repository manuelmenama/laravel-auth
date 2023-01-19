@extends('layouts.app')

@section('title')

| Create

@endsection

@section('content')

<div class="container">
    <h1>Add a project</h1>
    @csrf
    <form action="{{ route('admin.project.store') }}">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Project name..." name="name">
        </div>
        <div class="mb-3">
            <label for="client_name" class="form-label">Client name</label>
            <input type="text" class="form-control" id="client_name" placeholder="Client name..." name="client_name">
        </div>
        <div class="mb-3">
            <label for="cover_image" class="form-label">Cover image</label>
            <input type="text" class="form-control" id="cover_image" placeholder="Image path..." name="cover_image">
        </div>
        <div class="mb-3">
            <label for="summary" class="form-label">Summary</label>
            <textarea class="form-control" id="summary" rows="3" name="summary"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Invia</button>
    </form>
</div>

@endsection
