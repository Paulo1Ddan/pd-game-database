<?php

namespace App\Http\Middleware;

use App\Models\Difficulty;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OwnerDifficulty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->difficulty){
            $id = $request->difficulty;
            try{
                $difficulty = Difficulty::findOrFail($id);

                if($difficulty->user_id !== auth()->user()->id){
                    return redirect()->back();
                }else{
                    return $next($request);
                }
            }catch(\Exception $e){
                abort(404);
            }
        }else{
            return $next($request);
        }

    }
}
