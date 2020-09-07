<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Comment;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return string
     */
    public function index()
    {
        $comments = Comment::all();

        return response($comments);
    }

    public function apiC()
    {
        return view('apiC');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([ //walidacja danych
            'body' => 'required|max:200',
        ]);

        if($validatedData)//spardzenie poprawności walidacji
        {
            $user = Auth::user()->name;

            return Comment::create([
                'body' => $request->body,
                'author' => $user,
            ]);
            return response('comments')->json($comment, 201);
        }
        else
        {
            return abort(404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $com = Comment::findOrFail($id);
        $com->delete();

        $com = ("usunięto komentarz o id: " .$id);

        return response($com);
    }
}
