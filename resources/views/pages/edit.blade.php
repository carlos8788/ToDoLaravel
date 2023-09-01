@extends('app')

@section('content')
    <div class="container">
        <h1 class="mt-5">Edit Todo</h1>

        <form action="{{ route('todos-update', $todo->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $todo->title }}">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>

@endsection
