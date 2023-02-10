<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Slider;
use App\Models\Product;
use App\Models\MultiImg;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index()
    {
        $slides = Slider::where('status', 1)->orderBy('id', 'ASC')->get();

        $categories = Category::orderBy('category_name_vi', 'ASC')->get();

        $slide_products = Product::where([
                                        ['status', '=', '1'],
                                        ['slide_products', '=', '1'] ])->inRandomOrder()->orderBy('id', 'ASC')->get();

        $new_products = Product::where([
                                        ['status', '=', '1'],
                                        ['new_products', '=', '1'] ])->inRandomOrder()->orderBy('id', 'ASC')->get();

        $speOffer_products = Product::where([
                                        ['status', '=', '1'],
                                        ['special_offer', '=', '1'] ])->inRandomOrder()->orderBy('id', 'ASC')->limit(9)->get();

        $products = Product::where('status', 1)->inRandomOrder()->orderBy('id', 'DESC')->get();

        return view('frontend.index', compact('categories', 'slides', 'slide_products', 
                                            'new_products', 'products', 'speOffer_products'));
    }


    public function productDetails($id, $slug)
    {
        $products = Product::findOrFail($id);
        $multi_img = MultiImg::where('product_id', $id)->get();
        $feature_products = Product::where([
                                            ['status', '=', '1'],
                                            ['featured', '=', '1'] ])->inRandomOrder()->orderBy('id', 'ASC')->get();
        $cat_id = $products->category_id;
        $related_products = Product::where('category_id', $cat_id)->where('id', '!=', $id)->orderBy('id', 'DESC')->get();

        return view('frontend.product.product_details', compact('products', 'multi_img', 'feature_products', 'related_products'));
    }


    public function productPage()
    {
        $categories = Category::orderBy('category_name_vi', 'ASC')->get();

        $products = Product::where('status', 1)->orderBy('id', 'DESC')->get();

        return view('frontend.product.products_page', compact('products', 'categories'));
    }


    public function productCatPage($id, $slug, $name)
    {
        $products = Product::where('status', 1)->where('category_id', $id)->orderBy('id', 'DESC')->get();

        $categories = Category::orderBy('category_name_vi', 'ASC')->get();

        //$title = ucwords(str_replace('-', ' ', $slug));
        $title = $name;
        $slug = $slug;

        return view('frontend.product.category_products', compact('products', 'categories', 'title', 'slug'));
    }


    public function userLogout()
    {
        Auth::logout();
        return redirect()->route('login');
    }


    public function userProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('dashboard', compact('user'));
    }


    public function userProfileUpdate(Request $request)
    {
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        $data->save();

        $notification = array(
            'message' => 'Your Profile Information Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }


    public function userPasswordUpdate(Request $request)
    {
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);

            $notification = array(
                'message' => 'Your Password has been changed Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Something wrong! Please try again!',
                'alert-type' => 'danger'
            );

            return redirect()->back()->with($notification);
        }

    }

    /// Product view by Ajax ///
    public function productViewAjax($id)
    {
        $product = Product::findOrFail($id);

        return response()->json(array(
            'product' => $product,
        ));
    }


























}













