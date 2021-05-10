<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{

    /**
     * @OA\Info(
     *      version="8.0",
     *      title="ticketing api endpoints by DAVOOD",
     *      description="Laravel Api Documentation with Swagger and JWT. [RESUME](/resume)",
     *         @OA\Contact(
     *          email="javadi.davood@gmail.com"
     *      ),
     * ),
     *
     * @OA\Server(
     *      url="http://davoodjavadi.ir/api",
     *      description="LIVE server"
     *  ),
     *
     * @OA\Server(
     *      url="http://localhost:8000/api",
     *      description="Dev server"
     *  ),
     *
     *
     * @OA\SecurityScheme(
     *      securityScheme="bearerAuth",
     *      type="http",
     *      scheme="bearer",
     *      bearerFormat="JWT",
     * )
     *
     */
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

}
