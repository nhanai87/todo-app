@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Task Details</h1>
        <p><strong>Title:</strong> {{ $task->title }}</p>
        <p><strong>Description:</strong> {{ $task->description }}</p>
        <p><strong>Status:</strong> {{ $task->status }}</p>
        <p><strong>Created At:</strong> {{ $task->created_at->format('Y-m-d H:i:s') }}</p>
        <a href="{{ route('tasks.index') }}" class="btn btn-primary">Back to Tasks</a>
    </div>
@endsection
