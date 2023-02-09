<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Auth;
use App\Models\Wishlist;
use Carbon\Carbon;


class WishlistController extends Controller
{
    public function addToWishlist(Request $request, $product_id)
    {

        if (Auth::check()) {

            $exists = Wishlist::where('user_id', Auth::id())->where('product_id', $product_id)->first();

            if (!$exists) {
               Wishlist::insert([
                'user_id' => Auth::id(), 
                'product_id' => $product_id, 
                'created_at' => Carbon::now(), 
            ]);
           return response()->json(['success' => 'Item Successfully Added to your Wishlist']);

            }else{

                return response()->json(['error' => 'This Item Already In your Wishlist']);

            }            

        }else{

            return response()->json(['error' => 'Signin your account first please!']);

        }

    } // end method


    public function index()
    {
        return view('frontend.home.wishlist');
    }


    public function getWishlistProduct()
    {
        $wishlist = Wishlist::with('product')->where('user_id', Auth::id())->latest()->get();

        return response()->json($wishlist);
    } // end method


    public function RemoveWishlistProduct($id){

        Wishlist::where('user_id',Auth::id())->where('id',$id)->delete();

        return response()->json(['success' => 'Your Item has been removed']);
    }







































}
