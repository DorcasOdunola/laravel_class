@extends('todo.index')

@section('content')
    <div class="container">
        @if (Auth::user())
            <div class="row">
                <div class="col-7 mx-auto">
                    <a href="/todo/create" class="p-3">
                        <button class="btn btn-info">Add todo</button>
                    </a>
                    @foreach ($todos as $todo)
                        @if (Auth::user() && Auth::user()->user_id == $todo->user_id )
                            <div class="row shadow mb-4 p-3">
                                <div class="col-3">{{ $todo->todo_name }}</div>
                                <div class="col-3">
                                    <img src="{{asset("images/" . $todo->image_name)}}" alt="" style="width: 100px; height: 100px; border-radius: 50%; border: 3px groove red">
                                </div>
                                {{-- <div class="col-3">{{ $todo->todo_desc }}</div> --}}
                                <div class="col-3">
                                    <a href="/todo/{{ $todo->todo_id }}/edit">
                                        <button class="btn btn-success">Edit</button>
                                    </a>
                                </div>
                                <div class="col-3">
                                    <a href="/todo/{{ $todo->todo_id }}">
                                        <button class="btn btn-danger">Delete</button>
                                    </a>
                                </div>
                            </div>
             
                            @else
                            You have no todo!!!
                                
                        @endif
                    @endforeach
                    
                </div>
            </div>
        </div>
        @else
            <div class="row">
                <div class="col-12 col-md-6 mx-auto shadow p-5">
                    <h1 class="text-center text-muted display-6">You are not logged in!!!!!!!!!</h1>
                    <a href="/login">Login</a>
                </div>

            </div>
            
        @endif
    
@endsection