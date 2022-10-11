<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    //
    public function create (Request $request) {
        
        $request->validate([
            "todo_name" => "required|min:5|max:20",
            "todo_desc" => "required|min:10|max:100",
            "image_name" => "max|5000|mimes:png,jpg,jpeg,gif"
        ]);

        $newName = time().$request->image->getClientOriginalName();
        $request->image->move(public_path('images'), $newName);


        $insert = DB::table('todo_tb')->insert([
            "todo_name" => $request->todo_name,
            "todo_desc" => $request->todo_desc,
            "image_name" => $newName,
            "user_id" => auth()->user()->user_id,
        ]);
        return redirect("/todo");

        //to frontend
        //  $insert = DB::table('todo_tb')->insert([
        //     "todo_name" => $request->todo_name,
        //     "todo_desc" => $request->todo_desc,
        //     "user_id" => 1,
        // ]);

        // $resp = [];
        // if ($insert) {
        //     $resp['success'] = true;
        //     $resp['message'] = "This is operation was successful";
        // } else {
        //     $resp['success'] = false;
        // }
        // return json_encode($resp);
    }


    public function read () {
        $todos = DB::table("todo_tb")->get();

        // joining using query builder
        // $todos = DB::table("todo_tb")
        // ->join("users", "todo_tb.user_id", "=", "users.user_id")
        // ->get();

        return view ("todo.todo", [
            "todos" => $todos
        ]);
    }

    public function edit ($todo_id) {
        $todo = DB::table("todo_tb")->where("todo_id", $todo_id)->first();
        return view("todo.edittodo", [
            "todo" => $todo
        ]);
    }

    public function update (Request $request, $id) {
        $todoUpdate = DB::table("todo_tb")->where("todo_id", $id)
        ->update([
            "todo_name" => $request->todo_name,
            "todo_desc" => $request->todo_desc
        ]);
        return redirect ("/todo");
    }

    public function delete ($todo_id) {
        $todo = DB::table("todo_tb")->where("todo_id", $todo_id)->delete();

        return redirect ("/todo");
    }
}
