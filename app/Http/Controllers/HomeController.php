<?php

namespace App\Http\Controllers;
use AfricasTalking\AfricasTalking;
use Illuminate\Http\Request;
use DB;
use Auth;
use DateTime;


use Illuminate\Support\Facades\Hash;
use Jenssegers\Agent\Facades\Agent;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
class HomeController extends Controller
{
    
   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */










    public function index(Request $request)
    {
       
        $date = new DateTime();   
        $timestamp = $date->getTimestamp();
        $browser = Agent::browser();    
        $request->session()->put('browser', $browser);

        Session::flash('message', 'The Email already in use'.$browser);

        return view('home');
    }



    // update Profile Info
    
    public function updateAccountInfo(Request $request)
    {
       
      
        $user = Auth::user();
      
        $user->name = $request->first_name;
        $user->Second_Name = $request->second__name;
        $user->Phone_Number = $request->phone_number;

        $user->save();
       

        return back()->with('success',' Profile updated');
    }




    // update Password Info
    
    public function newpassword(Request $request)
    {
       
 

        $this->validate($request, [
            'current_password' => 'required|current_password',
            'new_password' => 'required|min:8|confirmed',
            'new_password_confirmation' => 'required|min:8',
        ]);


        $user = Auth::user();


        if (Hash::check($request->current_password, $user->password)) {
            
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect()->route('profile')->with('success', 'Password updated successfully!');
        }



        
        return back()->with('success',' Profile Not updated');
    }















    // Handle Image profile Picture
    
    public function updateavatar(Request $request)
    {
        
        if($request->hasFile('avatar')){

            // Validate
            $this->validate($request, [
                'avatar' => 'required|image|mimes:jpg,png|max:5000' // 5000 KB = 5 MB
            ]);

            $post_image=$request->file('avatar');

            $filename=time().'.'.$post_image->getClientOriginalExtension();
            $manager = new ImageManager(Driver::class);
            $image = $manager->read($post_image);
            $image->crop(1000,1000)->save(public_path('/assets/img/Profile/'.$filename));

            $userid=Auth::User()->id;
            $currentAvatar=Auth::User()->Profile;

            // Delete file on the file if its not the default 
            if ($currentAvatar=="default.jpg") {
                // code...
            }
            else{
                $currentpath = public_path('/assets/img/Profile/'.$currentAvatar);
                 unlink($currentpath) or die('Couldnt delete file');
            }

            $user = Auth::user();
            $user->Profile = $filename;
            $user->save();

        }
        return back()->with('success',' Profile updated');
    }

    












    


    public function profile(Request $request)
    {

        
 
        $loggedin_instances = DB::table('sessions')
        ->where('user_id', Auth::user()->id)
        ->get();
        
        // return dd(decrypt(base64_decode($loggedin_instances)));

        return view('profile', compact('loggedin_instances'));
    }












// Session Manage
    
    public function passdeleteSessions(Request $request)
    {
        $data = request()->validate([
            'password' => 'required',
        ]);

        if (Hash::check($data['password'], Auth::User()->password)) {
            $this->deleteSessions($request);
            return back()->with('info',' Sessions deleted successfully');
        }
        else{
            return back()->with('error',' Incorrect Password, could not delete sessions');  
        }
    }








    public function deleteSessions(Request $request)
    {
        $userId = Auth::id();
        $currentSessionId = $request->session()->getId();


        DB::table('sessions')
        ->where('user_id', $userId)
        ->where('id', '!=', $currentSessionId)
        ->delete();

         return back()->with('info',' Sessions deleted successfully');
    }


    
}
