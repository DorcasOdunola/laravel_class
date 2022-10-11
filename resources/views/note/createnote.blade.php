@extends('note.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="shadow p-4">
                    <a href="/note">
                        <button class="btn btn-dark">View Note</button>
                    </a>
                    <form action="/note" method="POST">
                        @csrf
                        {{-- @method("PUT") --}}
                        <h1 class="text-center text-muted">ADD NOTE</h1>
                        <input type="text" name="note_title" placeholder="Note Title" class="form-control mb-3">
                        <textarea name="note" placeholder="Your note here....." class="form-control mb-3"></textarea>
                        <button  type="submit" class="btn btn-outline-primary w-100">ADD NOTE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection