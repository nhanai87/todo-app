@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Task</h1>

        <form method="POST" action="{{ route('tasks.update', $task->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Title:</label>
                <input type="text" name="title" class="form-control" value="{{ $task->title }}" required>
            </div>
            <div class="form-group">
                <label>Description:</label>
                <textarea name="description" class="form-control" required>{{ $task->description }}</textarea>
            </div>
            <div class="form-group">
                <label>Status:</label>
                <select name="status" class="form-control" required>
                    <option value="to-do" {{ $task->status === 'to-do' ? 'selected' : '' }}>To-Do</option>
                    <option value="doing" {{ $task->status === 'doing' ? 'selected' : '' }}>Doing</option>
                    <option value="done" {{ $task->status === 'done' ? 'selected' : '' }}>Done</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
