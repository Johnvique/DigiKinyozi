<?php

namespace App\Http\Controllers;
use File;
use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        return view('dashboard/client',compact('clients')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('picture')) {
            $filenameWithExt = $request->file('picture')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('picture')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('picture')->move(public_path('images'), $fileNameToStore);
        } else {
            $fileNameToStore = 'default.jpg';
        }


        $client = new Client;
        $client->client_name=$request->get ('client_name');
        $client->client_mail=$request->get ('client_mail');
        $client->client_phone=$request->get ('client_phone');
        $client->client_location=$request->get ('client_location');
        $client->picture = $fileNameToStore;

        $client->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id);
        return view('dashboard/edit_client',compact('client'));

        return redirect('client');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $client = Client::find($id);
        $client->update([
            'client_name'=>$request->client_name,
            'client_mail'=>$request->client_mail,
            'client_phone'=>$request->client_phone,
            'client_location'=>$request->client_location,
            'picture'=>$request->picture,
        ]);
        return redirect('client');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        file::delete('images/'.$client->picture);
        $client->delete();
        return redirect('client');
    }
}
