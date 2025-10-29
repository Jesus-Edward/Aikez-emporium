<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function StoreComment(Request $request)
    {
        $request->validate([
            'blog_id' => 'required|integer',
            'message' => "required"
        ]);

        $comment = new Comment();
        $comment->user_id = Auth::user()->id;
        $comment->blog_id = $request->blog_id;
        $comment->message = $request->message;
        $comment->save();
        $notification = array('message' => 'Comment added successfully, awaiting approval', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function CommentIndex()
    {
        $comments = Comment::latest()->get();
        return view('admin.blog.comment.index', compact('comments'));
    }

    public function ToggleStatus(Request $request)
    {

        $commentId = $request->input('comment_id');
        $isCheck = $request->input('is_checked', 0);
        $comment = Comment::findOrFail($commentId);
        if ($comment) {
            $comment->status = $isCheck;
            $comment->save();
        }
        return response()->json(['message' => 'Comment status updated successfully']);
    }

    public function DeleteComment($id)
    {
        try {
            $comment = Comment::findOrFail($id);
            $comment->delete();
            return response(['status' => 'success', 'message' => 'Comment deleted successfully']);
        } catch (\Exception $e) {
            logger($e);
            return response(['status' => 'error', 'message' => 'Something went wrong']);
        }
    }
}
