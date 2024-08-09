<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        return CommentResource::collection(Comment::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $comment= Comment::create($request->all());
        return response()->json([
            'message'=>'Comment has been created successfully',
            'comment'=> new CommentResource($comment)
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        return new CommentResource($comment);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $comment->update($request->all());
        return response()->json([
            'message'=>'Comment has been updated successfully',
            'comment'=> new CommentResource($comment)
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        if ($comment) {
            $comment->delete();
            return response()->json('Comment has been deleted'); // Successful deletion with no content
        }


    }
}
