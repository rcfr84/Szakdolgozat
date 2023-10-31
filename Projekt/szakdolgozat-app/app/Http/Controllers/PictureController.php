<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use App\Models\Advertisement;
use Illuminate\Http\Request;

class PictureController extends Controller
{
    public function __construct()
    {
        $this->middleware('CheckRole:admin')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        $AdvertisementPictures = Picture::where('advertisement_id', $user->user_id)->get();

        return view('pictures.index', compact('AdvertisementPictures'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();

        $AdvertisementPictures = Advertisement::where('picture_id', $user->user_id)->get();
        return view('pictures.create', compact('AdvertisementPictures'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'src' => 'required',
        ]);

        $newPicture = new Picture();
        $newPicture->src = $request->src;
        $newPicture->save();

        return redirect()->route('pictures.index')->with('status', 'Picture added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Picture $picture)
    {
        $user = auth()->user();

        $AdvertisementPictures = Advertisement::where('picture_id', $user->user_id)->get();

        return view('pictures.show', compact('AdvertisementPictures'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Picture $picture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Picture $picture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = auth()->user();

        $picture = Picture::find($id);

        if (!$picture) 
        {
            return redirect()->route('/dashboard')->with('status', 'Picture not found!');
        }

        $picture->delete();

        return redirect()->route('pictures.index')->with('status', 'Picture deleted successfully!');
    }
}
