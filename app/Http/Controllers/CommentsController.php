<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ticket;
use App\Models\Category;
use App\Models\User;
use App\Models\Comment;
use App\Mail\sendTicketComment;
use Illuminate\Support\Facades\Mail;

class CommentsController extends Controller
{
    /**
     * @OA\Post(
     * path="/comment/store",
     *   tags={"Comment"},
     *   summary="store user comment",
     *   operationId="store comment",
     *   security={ {"bearerAuth": {} }},
     *
     *   @OA\Parameter(
     *      name="comment",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="user_id",
     *      in="query",
     *      @OA\Schema(
     *          type="integer"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="ticket_id",
     *      in="query",
     *      @OA\Schema(
     *          type="integer"
     *      )
     *   ),
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *  )
     * )
     **/
    /**
     * store comment api
     *
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request){
         $this->validate($request,[
             'comment' => 'required'
         ]);

         $comment = Comment::create([
             'ticket_id' => $request->input('ticket_id'),
             'user_id' => Auth::user()->id,
             'comment' => $request->comment
         ]);
/*
         if($comment->ticket->user->id !== Auth::user()->id){
             Mail::to($comment->ticket->user)->send(new sendTicketComment($comment));//ارسال پاسخ به درخواست کننده
*/
            return response()->json([
                'success' => true,
                'message' => 'Sended Your response'
            ],200);

    //     }

     }
}
