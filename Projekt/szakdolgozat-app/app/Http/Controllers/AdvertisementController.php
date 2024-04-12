<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\County;
use App\Models\City;
use Illuminate\Support\Facades\Auth;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $advertisements = Advertisement::with('pictures')->orderByDesc('created_at')->paginate(15);
        $counties = County::all();
        $cities = City::all();
        $categories = Category::all();

        return view('advertisements.list', compact('advertisements', 'counties', 'cities', 'categories'));
    }

    public function ownAdvertisements()
    {
        $this->authorize('ownAdvertisement', Advertisement::class);

        $advertisements = Advertisement::where('user_id', Auth::user()->user_id)->with('pictures')
        ->orderByDesc('created_at')->paginate(15);

        return view('advertisements.ownList', compact('advertisements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Advertisement::class);

        $categories = Category::orderBy('name')->get();
        $counties = County::orderBy('name')->get();
        $cities = [];

        return view('advertisements.create', compact('categories', 'counties', 'cities'));
    }

    public function getCitiesByCounty($countyId)
    {
        $cities = City::where('county_id', $countyId)->orderBy('name')->get();
        return response()->json($cities);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('store', Advertisement::class);

        $request->validate([
            'city_id' => 'required',
            'category_id' => 'required',
            'title' => 'required|max:40',
            'price' => 'required|integer|min:0',
            'description' => 'required|max:1000',
            'pictures.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'mobile_number' => 'max:20',
        ]);
    
        $newAdvertisement = new Advertisement();
        $newAdvertisement->user_id = Auth::user()->user_id;
        $newAdvertisement->city_id = $request->city_id;
        $newAdvertisement->category_id = $request->category_id;
        $newAdvertisement->title = $request->title;
        $newAdvertisement->price = $request->price;
        $newAdvertisement->description = $request->description;
    
        if ($request->has('mobile_number')) 
        {
            $newAdvertisement->mobile_number = $request->mobile_number;
        }
    
        $newAdvertisement->save();
    
        if ($request->hasFile('pictures')) 
        {
            foreach ($request->file('pictures') as $picture) 
            {
                $path = $picture->store('advertisement_images', 'public');
                $newAdvertisement->pictures()->create(['src' => $path]);
            }
        }
    
        return redirect()->route('advertisements.own')->with('status', 'Sikeres hozzáadás!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $advertisement = Advertisement::find($id);

        if (!$advertisement) 
        {
            return redirect()->route('advertisements.index')->with('error', 'Nincsen ilyen hirdetés!');
        }

        return view('advertisements.show', compact('advertisement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $advertisement = Advertisement::find($id);

        if (!$advertisement) 
        {
            return redirect()->route('advertisements.own')->with('error', 'Nincsen ilyen hirdetés!');
        }

        $this->authorize('edit', $advertisement);

        $advertisement->load('pictures');

        $categories = Category::orderBy('name')->get();
        $counties = County::orderBy('name')->get();
        $cities = City::where('county_id', $advertisement->county_id)->orderBy('name')->get();

        return view('advertisements.edit', compact('advertisement', 'counties', 'cities', 'categories'));
    }

    public function editCountyAndCity(Request $request, $id)
    {
        auth()->user();
        
        $advertisement = Advertisement::find($id);
        $this->authorize('editCountyAndCity', $advertisement);

        if ($advertisement === null) 
        {
            return redirect()->route('advertisements.own')->with('error', 'Nincsen ilyen hirdetés!');
        }

        $counties = County::orderBy('name')->get();
        $cities = [];

        return view('advertisements.countyCityEdit', compact('cities', 'advertisement', 'counties'));
    }

    public function updateCountyAndCity(Request $request, $id)
    {
        $advertisement = Advertisement::find($id);
        $this->authorize('updateCountyAndCity', $advertisement);
        
        $advertisement->city_id = $request->city_id;
        if ($advertisement === null) 
        {
            return redirect()->route('advertisements.own')->with('error', 'Nincsen ilyen hirdetés!');
        }
        if ($request->city_id === null) 
        {
            return redirect()->route('advertisements.editCountyAndCity', $advertisement->advertisement_id)->with('error', 'Nem választottad ki a vármegyét vagy a várost!');
        }
        $advertisement->update();

        return redirect()->route('advertisements.edit', $advertisement->advertisement_id)->with('status', 'Sikeres módosítás!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $advertisement = Advertisement::find($id);
        
        $this->authorize('update', $advertisement);

        if (!$advertisement) 
        {
            return redirect()->route('advertisements.own')->with('error', 'Nincsen ilyen hirdetés!');
        }

        $request->validate([
            'category_id' => 'required',
            'title' => 'required|max:40',
            'price' => 'required|integer|min:0',
            'description' => 'required|max:1000',
            'pictures.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'mobile_number' => 'max:20',
        ]);

        if (auth()->user()->role->name !== 'admin') 
        {
            $advertisement->user_id = Auth::user()->user_id;
        }
        $advertisement->category_id = $request->category_id;
        $advertisement->title = $request->title;
        $advertisement->price = $request->price;
        $advertisement->description = $request->description;

        if ($request->hasFile('pictures')) 
        {
            foreach ($request->file('pictures') as $picture) 
            {
                $path = $picture->store('advertisement_images', 'public');
                $advertisement->pictures()->create(['src' => $path]);
            }
        }

        if ($request->has('mobile_number')) 
        {
            $advertisement->mobile_number = $request->mobile_number;
        }

        $advertisement->update();

        if (auth()->user()->role->name === 'admin')
        {
            return redirect()->route('advertisements.index')->with('status', 'Sikeres módosítás!');
        }

        return redirect()->route('advertisements.own')->with('status', 'Sikeres módosítás!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $advertisement = Advertisement::find($id);

        if ($this->authorize('destroy', $advertisement))
        {
            $advertisement->delete();
            return redirect()->route('advertisements.index')->with('status', 'Sikeres törlés!');
        }
        
    }

    public function showByCategory($categoryId)
    {
        $category = Category::find($categoryId);

        if (!$category) 
        {
            return redirect()->route('categories.index')->with('error', 'Nincsen ilyen kategória!');
        }

        $advertisements = $category->advertisements()->orderByDesc('created_at')->paginate(15);

        return view('categories.show', compact('advertisements', 'category'));
    }

    public function searchByTitle(Request $request)
    {
        $request->validate([
            'search' => 'required|min:4',
        ]);

        $search = $request->search;
        $advertisements = Advertisement::where('title', 'LIKE', "%{$search}%")->orderByDesc('created_at')->paginate(15);

        return view('advertisements.search', compact('advertisements'));
    }

    public function searchByTitleOwn(Request $request)
    {
        $request->validate([
            'search' => 'required|min:4',
        ]);

        $search = $request->search;
        $advertisements = Advertisement::where('title', 'LIKE', "%{$search}%")->where('user_id', Auth::user()->user_id)->orderByDesc('created_at')->paginate(15);

        return view('advertisements.searchOwnList', compact('advertisements'));
    }

    public function filter(Request $request)
    {
        $request->validate([
            'min_price' => 'nullable|numeric|min:0',
            'max_price' => 'nullable|numeric|min:0',
            'county' => 'nullable|exists:counties,name',
            'city' => 'nullable|exists:cities,name',
            'category' => 'nullable|exists:categories,name',
        ]);

        $query = Advertisement::query();

        if ($request->filled('min_price') && $request->filled('max_price')) 
        {
            $query->whereBetween('price', [$request->input('min_price'), $request->input('max_price')]);
        } 
        else 
        {
            if ($request->filled('min_price'))
            {
                $query->where('price', '>=', $request->input('min_price'));
            }
        
            if ($request->filled('max_price')) 
            {
                $query->orWhere('price', '<=', $request->input('max_price'));
            }
        }
        
        if ($request->filled('county_id')) 
        {
            $query->whereHas('city.county', function ($q) use ($request) 
            {
                $q->where('county_id', '=', $request->input('county_id'));
            });
        }
    
        if ($request->filled('city_id'))
        {
            $query->whereHas('city', function ($q) use ($request) 
            {
                $q->where('city_id', '=', $request->input('city_id'));
            });
        }
    
        if ($request->filled('category_id')) 
        {
            $query->whereHas('category', function ($q) use ($request) 
            {
                $q->where('category_id', '=', $request->input('category_id'));
            });
        }

        $sortBy = $request->input('sort_by', 'default');

        if ($sortBy == 'asc') 
        {
            $query->orderBy('price', 'asc');
        } 
        elseif ($sortBy == 'desc') 
        {
            $query->orderBy('price', 'desc');
        }
    
        $advertisements = $query->orderByDesc('created_at')->paginate(15)->appends(request()->query());
    
        return view('advertisements.filter', compact('advertisements'));
    }
}
