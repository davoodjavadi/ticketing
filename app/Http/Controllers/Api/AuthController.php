<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Requests\RegisterAuthRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;


class AuthController extends Controller
{
    //public $token = true;

    /**
     * @OA\Post(
     ** path="/register",
     *   tags={"User"},
     *   summary="sign up",
     *   operationId="sign up",
     *
     *  @OA\Parameter(
     *      name="name",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *  @OA\Parameter(
     *      name="email",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="password",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
    *    @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *
     *
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *  )
     * )
     *
     **/
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {

        $data = $request->only('name', 'email', 'password');
        $validator = Validator::make($data, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|max:50'
        ]);


        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 400);
        }


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);


        return response()->json([
            'success' => true,
            'message' => trans('lang.registered'),
            'data' => $user
        ], 200);
    }



    /**
     * @OA\Post(
     * path="/login",
     *   tags={"User"},
     *   summary="sign in",
     *   operationId="sign in",
     *
     *   @OA\Parameter(
     *      name="email",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="password",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      )
     *   ),
     *  @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *
     *   @OA\Response(
     *      response=401,
     *       description="Unauthorized"
     *   ),
     *   @OA\Response(
     *      response=406,
     *      description="not Token"
     *   ),
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
    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */

    public function login(Request $request)
    {
        $input = $request->only('email', 'password');


        $validator = Validator::make($input, [
            'email' => 'required|email',
            'password' => 'required|string|min:6|max:50'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 400);
        }


        try {
            if (! $token = JWTAuth::attempt($input)) {
                return response()->json([
                    'success' => false,
                    'message' => trans('lang.invalidData'),
                ], 401);
            }
        } catch (JWTException $e) {
//            return $input;

            return response()->json([
                'success' => false,
                'message' => trans('lang.dontToken'),
            ], 500);
        }

        //Token created, return with success response and jwt token
            return response()->json([
                'success' => true,
                'token' => $token,
            ]);
        }


    /**
     * @OA\Get(
     * path="/logout",
     *   tags={"User"},
     *   summary="Logout",
     *   operationId="log out",
     * security={ {"bearerAuth": {} }},
     *
     *  @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=401,
     *      description="dont logout"
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
     * logout api
     *
     * @return \Illuminate\Http\Response
     */

    public function logout(Request $request)
    {
    /*    $this->validate($request, [
            'token' => 'required'
        ]);
        $validator = Validator::make($request->only('token'), [
            'token' => 'required'
        ]);
      if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 400);
        }
*/

        try {
            JWTAuth::invalidate($request->token);

            return response()->json([
                'success' => true,
                'message' => trans('lang.logout')
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => trans('lang.dontLogout')
            ], 401);
        }
    }



    /**
     * @OA\Get(
     * path="/user",
     *   tags={"User"},
     *   summary="get auth user",
     *   operationId="get auth user",
     *   security={ {"bearerAuth": {} }},
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
    /**
     * auth user api
     *
     * @return \Illuminate\Http\Response
     */
    public function getAuthUser(Request $request)
    {
        /*$this->validate($request, [
            'token' => 'required'
        ]);*/

        $user = JWTAuth::authenticate($request->token);
        //dd($user);
        return response()->json(['user' => $user]);
    }
}
