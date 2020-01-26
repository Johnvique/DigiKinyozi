<?php

namespace App\Http\Controllers;
use File;
use App\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artists = Artist::all();
        return view('dashboard/artist',compact('artists')); 
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



        $artist = new Artist;
        $artist ->artist_name =$request->get ('artist_name');
        $artist ->artist_phone =$request->get ('artist_phone');
        $artist ->artist_role =$request->get ('artist_role');
        $artist->picture = $fileNameToStore; 

        $artist ->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function show(Artist $artist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artist = Artist::find($id);
        return view('dashboard/edit_artist', compact('artist'));

        return redirect('artist');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $artist = Artist::find($id);
        $artist->update([
            'artist_name'=>$request->artist_name,
            'artist_phone'=>$request->artist_phone,
            'artist_role'=>$request->artist_role,
            'picture'=>$request->picture,
        ]);

        return redirect('artist');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artist = Artist::find($id);
        file::delete('images/'.$artist->picture);
        $artist->delete();
        return redirect('artist');
    }
}
