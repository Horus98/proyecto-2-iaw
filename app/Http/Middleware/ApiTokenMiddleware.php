<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class ApiTokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
  {
    if (!$request->has("api_token")) {
      return response()->json([
        'status' => 401,
        'message' => 'Acceso no autorizado',
      ], 401);
    }

    if ($request->has("api_token")) {
        $input_token = $request->api_token;
        $api_key = User::where('api_token','=',$input_token)->select('name')->first();
        if ($api_key == "" ) {
          return response()->json([
            'status' => 401,
            'message' => 'Acceso Denegado!',
          ], 401);
        }
      } 

    return $next($request);
  }
}



 /*  if ($request->has("api_token")) {
    $api_key = "key_cur_prod_fnPqT5xQEi5Vcb9wKwbCf65c3BjVGyBB";
    if ($request->input("api_token") != $api_key) {
      return response()->json([
        'status' => 401,
        'message' => User::where('api_token','=','25hwY0Tw6LHDFrHVgafloeaZSywcaixh92tmKAwdHDH0RmlPBeuSfpTnkiO9')->get(),
      ], 401);
    }
  } */