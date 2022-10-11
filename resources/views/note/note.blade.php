@extends('note.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto">
                <h5 class="display-6 text-muted text-center">
                    WELCOME TO YOUR NOTE
                </h5>
                <a href="/note/create">
                    <button class="btn btn-dark">ADD NOTE</button>
                </a>
                @foreach ($notes as $note)
                    <div class="row shadow p-3 mb-3">
                        <div class="col-3">
                            {{$note->note_id}}
                        </div>
                        <div class="col-3">
                            <h5 class="text-muted">{{$note->note_title}}</h5>
                        </div>
                        <div class="col-3"><button class="btn btn-success">EDIT</button></div>
                        <div class="col-3"><button class="btn btn-danger">DELETE</button></div>
                    </div>
                    
                @endforeach
            </div>
        </div>
    </div>
@endsection