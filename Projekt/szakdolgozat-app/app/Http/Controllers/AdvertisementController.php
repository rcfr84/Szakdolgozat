<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\County;
use App\Models\City;
use Illuminate\Support\Facades\Auth;
use App\Models\Picture;

class AdvertisementController extends Controller
{
    public function __construct()
    {
        $this->middleware('CheckRole:admin')->only(['edit', 'update', 'destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $advertisements = Advertisement::all()->sortByDesc('created_at');
        return view('advertisements.list', compact('advertisements'));
    }

    public function ownAdvertisements()
    {
        $advertisements = Advertisement::where('user_id', Auth::user()->user_id)->get();
        return view('advertisements.list', compact('advertisements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $counties = County::all();
        $cities = [];

        return view('advertisements.create', compact('categories', 'counties', 'cities'));
    }
    public function getCitiesByCounty($countyId)
    {
        $cities = City::where('county_id', $countyId)->get();
        return response()->json($cities);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'city_id' => 'required',
            'category_id' => 'required',
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
            'picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $newAdvertisement = new Advertisement();
        $newAdvertisement->user_id = Auth::user()->user_id;
        $newAdvertisement->city_id = $request->city_id;
        $newAdvertisement->category_id = $request->category_id;
        $newAdvertisement->title = $request->title;
        $newAdvertisement->price = $request->price;
        $newAdvertisement->description = $request->description;

        if ($request->hasFile('picture')) {
            $picturePath = $request->file('picture')->store('public/images');
    
            $picture = new Picture();
            $picture->src = $picturePath;
            $picture->save();
    
            $newAdvertisement->picture_id = $picture->picture_id;
        }
    
        

        if ($request->has('mobile_number')) 
        {
            $newAdvertisement->mobile_number = $request->mobile_number;
        }

        $newAdvertisement->save();

        return redirect()->route('advertisements.index')->with('status', 'Advertisement created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $advertisement = Advertisement::find($id);

        if (!$advertisement) 
        {
            return redirect()->route('advertisements.index')->with('error', 'Advertisement not found!');
        }

        return view('advertisements.show', compact('advertisement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (auth()->user()->user_id != Advertisement::find($id)->user_id) 
        {
            return redirect()->route('advertisements.index')->with('error', 'You can only edit your own advertisements!');
        }

        $advertisement = Advertisement::find($id);

        if (!$advertisement) 
        {
            return redirect()->route('advertisements.index')->with('error', 'Advertisement not found!');
        }

        return view('advertisements.edit', compact('advertisement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (auth()->user()->user_id != Advertisement::find($id)->user_id) 
        {
            return redirect()->route('advertisements.index')->with('error', 'You can only edit your own advertisements!');
        }

        $advertisement = Advertisement::find($id);

        if (!$advertisement) 
        {
            return redirect()->route('advertisements.index')->with('error', 'Advertisement not found!');
        }

        $request->validate([
            'user_id' => 'required',
            'city_id' => 'required',
            'category_id' => 'required',
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        $advertisement->user_id = $request->user_id;
        $advertisement->city_id = $request->city_id;
        $advertisement->category_id = $request->category_id;
        $advertisement->title = $request->title;
        $advertisement->price = $request->price;
        $advertisement->description = $request->description;

        if($request->has('picture_id'))
        {
            $advertisement->picture_id = $request->picture_id;
        }

        if ($request->has('mobile_number')) 
        {
            $advertisement->mobile_number = $request->mobile_number;
        }

        $advertisement->update();

        return redirect()->route('advertisements.index')->with('status', 'Advertisement updated successfully!');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (auth()->user()->user_id != Advertisement::find($id)->user_id) 
        {
            return redirect()->route('advertisements.index')->with('error', 'You can only delete your own advertisements!');
        }

        $advertisement = Advertisement::find($id);

        if (!$advertisement) 
        {
            return redirect()->route('advertisements.index')->with('error', 'Advertisement not found!');
        }

        $advertisement->delete();

        return redirect()->route('advertisements.index')->with('status', 'Advertisement deleted successfully!');
    }
}
