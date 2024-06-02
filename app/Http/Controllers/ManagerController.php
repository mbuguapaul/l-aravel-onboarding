<?php

namespace App\Http\Controllers;

use App\Models\manager;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function clients()
    {

        $userId = auth()->id(); // Get the ID of the currently logged-in user

        $clients = manager::where('Created_by', $userId)->get();
        return view('Clients.clients', compact('clients'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function chats()
    {
        return view('Chats');
        
    }


    public function newClient(Request $request)
    {
        $client = new manager();
      
        $client->Client_name = $request->Client_name;
        $client->Client_phone = $request->Client_phone_number;
        $client->Client_email = $request->Client_email;
        $client->Client_address = $request->Client_Address;
        $client->Created_by =Auth::User()->id;



        $client->save();

        $new_name=$request->Client_name;

        return back()->with('success',$new_name.'  added to the Client List');
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
    public function show(manager $manager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(manager $manager)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, manager $manager)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(manager $manager)
    {
        //
    }
}
