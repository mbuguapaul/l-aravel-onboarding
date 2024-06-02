<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


use Jenssegers\Agent\Agent;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Session;

use DB;

class StoreSessionInfo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
  
    public function handle(Request $request, Closure $next): Response
    {
      
         // $session_id = Session::getId();

         

      
           Session::start();    
             $agent = new Agent();
             $session =Session();

             // $browser = $agent->browser();
             // $os = $agent->platform();

             // session(['os' => $os, 'browser' => $browser]);

          // Session()->put('os', $os);
          //  Session()->put('browser', $browser);

          //  Session::save();
          //  session()->regenerate();
               // Store the user's OS and browser info in the current session
       // Store the user's OS and browser info in the current session
        $session->put('browser.os', $agent->platform());
        $session->put('browser.name', $agent->browser());

        $deviceType = $agent->isMobile() ? 'mobile' : 'desktop';
        $session->put('browser.device', $deviceType);
        
       // Store the user's OS and browser info in the database for the current session
        $sessionId = $session->getId();
        $os = $agent->platform();
        $browser = $agent->browser();

        DB::table('sessions')
            ->where('id', $sessionId)
            ->update([
                'os' => $os,
                'browser' => $browser,
                'device' => $deviceType,
            ]);
  
        return $next($request);
    }







    
}
