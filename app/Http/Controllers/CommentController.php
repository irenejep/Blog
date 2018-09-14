<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use App\Comment;

class CommentController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function index()
    {
        //
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'post_id' =>'required',
            'body' =>'required'
            ]);
            auth()->user()->publishComment(
                new Comment(request(['body', 'post_id']))
            );

        return back();
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update($id)
    {
        $this->validate(request(),[
            'body' =>'required'
            ]);
            Comment::where('id', $id)
            ->update(request(['body']));

            return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comment::where('id', $id)
        ->delete();

        return back();
    }
}
