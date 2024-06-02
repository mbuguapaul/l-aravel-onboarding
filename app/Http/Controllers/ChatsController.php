<?php

namespace App\Http\Controllers;
use DB;
use App\Models\chats;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChatsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function incoming(Request $request)
    {
        // Parse the payload using query strings or request body (depending on your preference)
        $payload = $request->query(); // Assuming query strings are used

        // Extract key-value pairs from the payload
        $incomingText = 
        [
        'linkId' => $payload->get('linkId'),
        text => $payload->get('text'),
        'to' => $payload->get('to'),
        'id' => $payload->get('id'),
        'cost' => $payload->get('cost'),
        'date' => $payload->get('date'),
        'from' => $payload->get('from'),
        'networkCode' => $payload->get('networkCode'),
        ];

        $chat = Chats::create($incomingText);
    }

    /**
     * Display the specified resource.
     */
    public function chats()
    {
       
        $mychats = DB::table('chats')->get();
        
        // return dd(decrypt(base64_decode($loggedin_instances)));

        return view('Chats', compact('mychats'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(chats $chats)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, chats $chats)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(chats $chats)
    {
        //
    }
}
