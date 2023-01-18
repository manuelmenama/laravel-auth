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
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Project name..." name="name">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
    </form>
</div>

@endsection
