@extends('layouts.app')
@section('content')

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="{{ asset('assets/todo.css') }}">

    <div class="main-content">
        
    @php
        use Carbon\Carbon;
        $today = Carbon::now()->locale('id'); // Bisa disesuaikan locale-nya
    @endphp

    <div class="d-flex justify-content-between align-items-center">
        <h3>Welcome back, Jose 👋</h3>
        <div>
            <i class="fas fa-bell fa-lg mx-1"></i>
            <i class="fas fa-calendar-alt fa-lg mx-3"></i>
            <span class="fw-bold">
                {{ $today->translatedFormat('l') }} <br> 
                {{ $today->format('d/m/Y') }}
            </span>
        </div>
    </div>


        <div class="row mt-4">
            <div class="col-md-12 task-column">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="text-purple">To-Do</h5>
                    <button id="add-task-btn" class="add-task-btn">
                        <span>+</span> Add task
                    </button>
                </div>
                <script>
                document.addEventListener('DOMContentLoaded', function () {
                document.getElementById('add-task-btn').addEventListener('click', function () {
                window.location.href = "{{ route('todos.create') }}";
                    });
                });
                </script>

                @foreach ( $todos as $todo )

                <div class="task-card border d-flex justify-content-start align-items-center task-item"
                @if($todo->completed) style="background-color: #f1f1f1; text-decoration: line-through; color: gray;" @endif>
                <form action="{{ route('todos.toggleCompleted', $todo->id) }}" method="POST" class="d-inline me-2">
                        @csrf
                        @method('PATCH')
                        <input 
                            type="checkbox" 
                            class="form-check-input checklist"
                            onchange="this.form.submit()" 
                            {{ $todo->completed ? 'checked' : '' }}
                        >
                    </form>
                    <div class="ms-4">
                        <strong>{{ $todo->title }}</strong>
                        <p>{{ $todo->description }}</p>
                        <span class="badge bg-primary">{{ $todo->priority }}</span>
                        <span class="font-monospace">{{ $todo->date }}</span>
                        <div class="text-end mt-3">
                        <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                        </form>
                        <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-outline-warning">Edit</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


@endsection
