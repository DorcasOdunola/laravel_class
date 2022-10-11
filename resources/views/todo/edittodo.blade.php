@extends('todo.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="shadow p-3">
                    <form action="/todo/{{ $todo->todo_id }}/edit" method="POST">
                        @csrf
                        <h5 class="display-6 text-muted text-center">EDIT TODO</h5>
                        <input type="text" placeholder="Todo Title" name="todo_name" class="form-control mb-3" value="{{ $todo->todo_name }}">

                        <input type="text" placeholder="Todo Description" name="todo_desc" class="form-control mb-3" value="{{ $todo->todo_desc }}">
                        <button type="submit" class="btn btn-outline-info w-100">EDIT Todo</button>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
    
   
@endsection