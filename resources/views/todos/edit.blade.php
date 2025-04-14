@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/todo.css') }}">

<style>
       .cart {
            width: 800px;
            height: 800px;
            background-color: #6f42c1;  
            color: white;
            border-top-right-radius: 15px;
            border-bottom-right-radius: 15px;
            margin: 20px;
            flex-shrink: 0;
        }
</style>

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="cart rounded h-100 p-4">
                <h6 class="mb-4">Create To-Do</h6>
            <div class="modal-body">
            <form action="{{ route('todos.update', $todo->id) }}" method="POST">
    @csrf
    @method("PUT")

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" value="{{ $todo->title }}" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Task Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ $todo->description }}</textarea>
                    </div>  
                    <div class="mb-3">
                        <label for="exampleSelect" class="form-label">Date</label>
                        <input type="datetime-local" value="{{$todo->date}}" class="form-control" id="date" name="date" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Priority</label>
                        <div>
                        <input type="radio" id="extreme" name="priority" value="extreme" {{ $todo->priority == 'extreme' ? 'checked' : '' }}> 
                            <label for="extreme" class="fw-bold text-warning">Extreme</label>

                            <input type="radio" id="moderate" name="priority" value="moderate" {{ $todo->priority == 'moderate' ? 'checked' : '' }}> 
                            <label for="moderate" class="fw-bold text-warning">Moderate</label>

                            <input type="radio" id="low" name="priority" value="low" {{ $todo->priority == 'low' ? 'checked' : '' }}> 
                            <label for="low" class="fw-bold text-warning">Low</label>
                        </div>
                    </div>
                  
                    <div class="modal-footer">
                        <a href="{{ route('todos.index') }}" class="btn btn-secondary" style="margin-right: 10px;">Close</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
