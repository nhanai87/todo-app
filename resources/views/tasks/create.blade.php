@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Task</h1>

        <form method="POST" action="{{ route('tasks.store') }}">
            @csrf
            <div class="form-group">
                <label>Title:</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Description:</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label>Status:</label>
                <select name="status" class="form-control" required>
                    <option value="to-do">To-Do</option>
                    <option value="doing">Doing</option>
                    <option value="done">Done</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
