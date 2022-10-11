@extends('todo.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="shadow p-3">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                        
                    @endif
                    <form action="/todo/create" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h5 class="display-6 text-muted text-center">ADD TODO</h5>
                        <input type="text" placeholder="Todo Title" name="todo_name" class="form-control mb-3">
                        @error('todo_name')
                            {{ $message }}
                        @enderror
                        <input type="text" placeholder="Todo Description" name="todo_desc" class="form-control mb-3">
                        <input type="file" name="image" class="form-control mb-3">
                        <button type="submit" class="btn btn-outline-info w-100">Add Todo</button>
                    </form>
                    <a href="/todo">
                        <button class="btn btn-info mt-3 w-100">View Todo</button>
                    </a>
                </div>
            </div>
        </div>
        
    </div>
    
   
@endsection