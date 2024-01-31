<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use App\Models\Advertisement;
use Illuminate\Http\Request;

class PictureController extends Controller
{
    /*
    public function __construct()
    {
        $this->middleware('CheckRole:admin')->only(['destroy']);
    }
    */
    /**
     * Display a listing of the resource.
     */
    public function index($advertisementId)
    {
        $user = auth()->user();

        $advertisement = Advertisement::find($advertisementId);
        $advertisementPictures = $advertisement->pictures;

        return view('pictures.list', compact('advertisement', 'advertisementPictures'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create($advertisementId)
    {
        $user = auth()->user();

        $advertisement = Advertisement::find($advertisementId);

        return view('pictures.create', compact('advertisement'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $advertisementId)
    {
        $user = auth()->user();

        foreach ($request->file('pictures') as $picture) {
            $filename = 'advertisement_image_' . uniqid() . '.' . $picture->getClientOriginalExtension();
            $path = $picture->storeAs('advertisement_images', $filename, 'public');
            Picture::create([
                'advertisement_id' => $advertisementId,
                'src' => $path,
            ]);}

        return redirect()->route('advertisements.own')->with('status', 'Sikeres hozzáadás!');
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
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($pictureId)
    {
        $user = auth()->user();

        $picture = Picture::find($pictureId);

        if ($picture) {
            $picture->delete();
            return redirect()->back()->with('success', 'Kép sikeresen törölve!');
        } else {
            return redirect()->back()->with('error', 'A kép nem található.');
        }

    }
}
