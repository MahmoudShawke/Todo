<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Tasks;
use Carbon\Carbon;
class checkdate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {



        $data = Tasks::select("start_date","end_date")->where("ID", $request->id)->get();

        
        $mytime = Carbon::now();
        foreach ($data as $key => $value){
            $last_date=$value->end_date;
        }
        
        if($mytime->getTimestamp()> $last_date){
            return redirect()->back();
        }elseif(!session('id')){
            
           
            return redirect()->back();
        }else{
            $next($request);
            return redirect()->back();
        }
    }
}
