<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    /**
     * @OA\Get(
     * path="/users",
     *   tags={"User"},
     *   summary="get all users",
     *   operationId="get all users",
     * security={ {"bearerAuth": {} }},
     *
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *  )
     * )
     **/
    public function index()
    {
        $users = User::all();

        return response()->json($users);

        // return view('admin.manegeUser', compact('users'));
    }

    public function store(Request $request)
    {
        //
    }
}