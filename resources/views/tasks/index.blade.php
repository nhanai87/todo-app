@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>My Tasks</h1>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">Create Task</a>
        <br><br>

        <!-- Task Filter Form -->
        <form method="GET" action="{{ route('tasks.index') }}">
            <div class="form-group">
                <label>Status:</label>
                <select name="status" class="form-control">
                    <option value="">All</option>
                    <option value="to-do" {{ request('status') == 'to-do' ? 'selected' : '' }}>To-Do</option>
                    <option value="doing" {{ request('status') == 'doing' ? 'selected' : '' }}>Doing</option>
                    <option value="done" {{ request('status') == 'done' ? 'selected' : '' }}>Done</option>
                </select>
            </div>
            <div class="form-group">
                <label>Creation Date:</label>
                <input type="date" name="created_at" class="form-control" value="{{ request('created_at') }}">
            </div>
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>

        <!-- Task List -->
        <table class="table">
            <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->created_at->format('Y-m-d') }}</td>
                    <td>
                        <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
