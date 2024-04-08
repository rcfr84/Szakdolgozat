public function show($id)
{
    $advertisement = Advertisement::find($id);

    if (!$advertisement) 
    {
        return redirect()->route('advertisements.index')->with('error', 'Nincsen ilyen hirdetés!');
    }

    return view('advertisements.show', compact('advertisement'));
}
