<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ticket;
use App\Models\Category;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\Comment;
use App\Mail\sendTicket;
use App\Mail\SendClosedTicket;
use Illuminate\Support\Facades\Mail;


class TicketsController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    /**
     * @OA\Get(
     *      path="/tickets",
     *      operationId="get my ticket list",
     *      tags={"Ticket"},
     *      summary="Get list of my ticket",
     *      description="Returns list of my ticket",
     *      security={ {"bearerAuth": {} }},
     *
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      )
     * )
     */
    public function index()
    {
     return $this->user->ticket()->get();//my ticket
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return response()->json($categories, 200);

    }


    /**
     * @OA\Post(
     * path="/store",
     *   tags={"Ticket"},
     *   summary="store ticket",
     *   operationId="store ticket",
     *   security={ {"bearerAuth": {} }},
     *
     *   @OA\Parameter(
     *      name="title",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="category",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="priority",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="message",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
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
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'category' => 'required',
            'priority' => 'required',
            'message' => 'required',
        ]);
        $ticket_code = 'tick - '.time();


        $tickets = Ticket::create(array_merge($request->all(),[
            'user_id' => Auth::user()->id,
            'ticket_code' => $ticket_code,
            'status' => "باز"
            ]));

//        Mail::to(Auth::user())->send(new sendTicket($tickets)); //This line send mail to the user with ticket information

          return response()->json([
              'success' => true,
              'message' => ' Ticket Created Successfully. That Code Is : ' . $ticket_code,
              'data' => $tickets
          ],200);

    }



    /**
     * @OA\Get(
     *      path="/ticket/{id}",
     *      operationId="get detail A ticket",
     *      tags={"Ticket"},
     *      summary="Get detail A ticket",
     *      description="Returns detail A ticket",
     *      security={ {"bearerAuth": {} }},
     *
     *  @OA\Parameter(
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *
     *    @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      )
     * )
     */
    public function show($id)
    {

        $ticket=$this->user->Ticket()->find($id);

        if(!$ticket) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry! you have not ticket.'
            ], 400);
        }

        return $ticket;

    }


    /**
     * @OA\Post(
     *      path="/close/{id}",
     *      operationId="close A ticket",
     *      tags={"Ticket"},
     *      summary="close A ticket",
     *      description="close A ticket",
     *      security={ {"bearerAuth": {} }},
     *
     *  @OA\Parameter(
     *      name="id",
     *      in="path",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *      )
     * )
     */
    public function close($id)
    {
        $ticket = Ticket::where('id', $id)->firstOrFail();
        $ticket->status = 'بسته';
        $ticket->save();

//        Mail::to($ticket->user)->send(new sendClosedTicket($ticket));

      return response()->json([
          'success'=> true,
          'message' => 'درخواست بسته شد.'
      ],200);

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
        //
    }
}
