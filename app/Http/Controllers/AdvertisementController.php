<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Advertisement.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'area' => 'required',
            'price' => 'required',
            'location' => 'required',
        ]);

        $image = $request->file('image');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images/advertisements'), $imageName);

        $advertisement = Advertisement::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $imageName,
            'area' => $validatedData['area'],
            'price' => $validatedData['price'],
            'location' => $validatedData['location'],
        ]);

        return redirect('/advertisements')->with('success', 'Advertisement has been added.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function show($id)
{
    $advertisement = Advertisement::findOrFail($id);
    return view('advertisements.show', compact('advertisement'));
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertisement $advertisement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advertisement $advertisement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertisement $advertisement)
    {
        //
    }
    public function search(Request $request)
{
    $location = $request->location;
    $minPrice = $request->minPrice;
    $maxPrice = $request->maxPrice;

    $advertisements = Advertisement::where('location', 'LIKE', '%'.$location.'%')
                                    ->whereBetween('price', [$minPrice, $maxPrice])
                                    ->get();

    return view('advertisements.index', compact('advertisements'));
}

}
