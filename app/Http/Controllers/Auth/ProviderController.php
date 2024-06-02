<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();

    }




    public function callback($provider)
    {
        try {
            $SocialUser = Socialite::driver($provider)->user();

            if(User::where('email',$SocialUser->getEmail())->exists())
            {

                if (User::where('email', $SocialUser->getEmail())
                ->where('provider', $provider)->exists()) {
    // Existing user with same email and provider, log them in
    Auth::login(User::where('email', $SocialUser->email)
            ->where('provider', $provider)
            ->first());
    
    return redirect('/home');
    }

    else{
        Session::flash('message', 'The Email is in use on a different provider');
        return redirect('/login')->withErrors(['email' => 'This email uses different method to login.']);
    }
            

                  
            }

           

            // $user = User::where([
            //     'provider' => $provider,
            //     'provider' => $SocialUser->id 
            // ])->first();
            

            // if(!$user){
            //     $user = User::create([
            //         'name' => $SocialUser->getName(),
            //         'email'=>$SocialUser->getEmail(),
            //         'username'=>User::generateUserName($SocialUser->getNickname()),
            //         'provider'=>$provider,
            //         'provider_id' => $SocialUser->getId(),
            //         'provider_token' => $SocialUser->token,
            //         'email_verified_at' => now(),


            //     ]);
            // }



        } catch (\Exception $e) {
            // Handle the exception, e.g., redirect to login page with a message

            Session::flash('message', 'Go home now!');
            return redirect('/login')->withErrors(['message' => 'Invalid login attempt. Please try again.']);
        }
    
        $user = User::updateOrCreate([
            'provider_id' => $SocialUser->id,
            'provider'=>$provider,
        ], [
            'name' => $SocialUser->name,
            'username'=>User::generateUserName($SocialUser->nickname),
            'email' => $SocialUser->email,
            'provider_token' => $SocialUser->token,
            'email_verified_at'=>now(),
           
        ]);
      
        Auth::login($user);
        return redirect('/home');
   
      

    }


    public function chats()
    {
        
    }
}
