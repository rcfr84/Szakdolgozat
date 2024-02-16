<?php

namespace App\Http\Controllers;
use App\Models\Advertisement;
class AdvertisementController extends Controller
{
    public function show($id)
    {
        $advertisement = Advertisement::find($id);

        if (!$advertisement) 
        {
            return redirect()->route('advertisements.index')->with('error', 'Nincsen ilyen hirdetés!');
        }

        return view('advertisements.show', compact('advertisement'));
    }
}
