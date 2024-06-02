<?php

namespace App\Http\Controllers;

use App\Models\User_Profiles;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function showOnboardingForm()
    {
        return view('onboard');
    }
    /**
     * Show the form for creating a new resource.
     */

     public function submitOnboarding(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'zipcode' => 'required|string|max:10',
            'job_title' => 'required|string|max:255',
            'industry' => 'required|string|max:255',
            'phone' => 'required|max:15|min:10',
            'website' =>'url',
        ]);

        $profileExists = User_Profiles::where('user_id', $user->id)->first();
        if ($profileExists) {
            
            
            $profileExists->update([
                'user_id' => $user->id,
                'company_name' => $request->company_name,
                'website' => $request->website,
                'country' => $request->country,
                'city' => $request->city,
                'address' => $request->address,
                'zipcode' => $request->zipcode,
                'job_title' => $request->job_title,
                'team_size' => $request->team_size,
                'industry' => $request->industry,
            ]);
         
        } else {
          
            User_Profiles::create([
                'user_id' => $user->id,
                'company_name' => $request->company_name,
                'website' => $request->website,
                'country' => $request->country,
                'city' => $request->city,
                'address' => $request->address,
                'zipcode' => $request->zipcode,
                'job_title' => $request->job_title,
                'team_size' => $request->team_size,
                'industry' => $request->industry,
                
            ]);
        }


       

        $user->update([
            'onboarding_completed' => true,
            'Second_Name'=> $request->last_name,
            'Phone_Number'=>$request->phone,
            'name'=>$request->first_name,


        ]);

        return view('home');
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User_Profiles $user_Profiles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User_Profiles $user_Profiles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User_Profiles $user_Profiles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User_Profiles $user_Profiles)
    {
        //
    }
}
