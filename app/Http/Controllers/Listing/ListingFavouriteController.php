<?php

namespace App\Http\Controllers\Listing;

use App\{Area, Listing};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListingFavouriteController extends Controller
{
    /**
     * ListingFavouriteController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('user.listings.favourites.index');
    }

    /**
     * @param Request $request
     * @param Area $area
     * @param Listing $listing
     * @return mixed
     */
    public function store(Request $request, Area $area, Listing $listing)
    {
        $request->user()->favouriteListings()->syncWithoutDetaching([$listing->id]);

        return redirect()->back()->withSuccess('Listing added to favourites.');
    }

    /**
     * @param Request $request
     * @param Area $area
     * @param Listing $listing
     * @return mixed
     */
    public function destroy(Request $request, Area $area, Listing $listing)
    {
        $request->user()->favouriteListings()->detach($listing);

        return redirect()->back()->withSuccess('Listing removed to favourites.');
    }
}
