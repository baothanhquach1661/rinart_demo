<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Coupon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if (Session::has('coupon')) {
           Session::forget('coupon');
        }

        //dd($product->product_code);

        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $id, 
                'name' => $request->product_name, 
                'pcode' => $product->product_code, 
                'qty' => $request->quantity, 
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thumbnail,
                ],
            ]);

            return response()->json(['success' => 'Item added in Your Cart']);

        }else{

            Cart::add([
                'id' => $id, 
                'name' => $request->product_name,
                'pcode' => $product->product_code,
                'qty' => $request->quantity, 
                'price' => $product->discount_price,
                'weight' => 1, 
                'options' => [
                    'image' => $product->product_thumbnail,
                ],
            ]);
            return response()->json(['success' => 'Item added in Your Cart']);
        }

    } // end method


    public function miniCart()
    {
        $carts = Cart::content();
        $cart_qty = Cart::count();
        $cart_total = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cart_qty' => $cart_qty,
            'cart_total' => $cart_total
        ));
    }


    public function removeMiniCart($rowId){
        Cart::remove($rowId);
        return response()->json(['success' => 'Item Removed']);

    } // end mehtod 


    public function cartIndex()
    {
        return view('frontend.home.cart');
    }


    public function getCartProduct()
    {
        $cart = Cart::content();
        $cart_qty = Cart::count();
        $cart_total = Cart::total();

        return response()->json(array(
            'cart' => $cart,
            'cart_qty' => $cart_qty,
            'cart_total' => $cart_total
        ));

    } // end method


    public function removeCartProduct($rowId)
    {
        Cart::remove($rowId);

        if (Session::has('coupon')) {
           Session::forget('coupon');
        }

        return response()->json(['success' => 'Item Successfully Removed']);
    }


    public function cartIncrement($rowId){
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty + 1);
        $total = (int)str_replace(',','',Cart::total());

        if (Session::has('coupon')) {

            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name',$coupon_name)->first();

           Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_percentage' => $coupon->discount_percentage,
                'discount_regular' => number_format($coupon->discount_regular, 0, '.', ','),
                'discount_percentage_amount' =>  round($total * $coupon->discount_percentage/100),
                'total_percentage_amount' => number_format($total - $total * $coupon->discount_percentage / 100, 0, '.', ','),

                'discount_regular_amount' =>  round($total * $coupon->discount_percentage/100),
                'total_regular_amount' => number_format($total - $coupon->discount_regular, 0, '.', ','),
                ]); 
        }

        return response()->json('increment');

    } // end mehtod 


    public function cartDecrement($rowId){
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty - 1);
        $total = (int)str_replace(',','',Cart::total());

        if (Session::has('coupon')) {

            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name',$coupon_name)->first();

           Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_percentage' => $coupon->discount_percentage,
                'discount_regular' => number_format($coupon->discount_regular, 0, '.', ','),
                'discount_percentage_amount' =>  round($total * $coupon->discount_percentage/100),
                'total_percentage_amount' => number_format($total - $total * $coupon->discount_percentage / 100, 0, '.', ','),

                'discount_regular_amount' =>  round($total * $coupon->discount_percentage/100),
                'total_regular_amount' => number_format($total - $coupon->discount_regular, 0, '.', ','),
                ]); 
        }

        return response()->json('decrement');

    } // end mehtod 


    public function couponApply(Request $request)
    {
        $coupon = Coupon::where('coupon_name',$request->coupon_name)->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();

        $total = (int)str_replace(',','',Cart::total());

        if ($coupon) {

            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_percentage' => $coupon->discount_percentage,
                'discount_regular' => number_format($coupon->discount_regular, 0, '.', ','),
                'discount_percentage_amount' =>  round($total * $coupon->discount_percentage/100),
                'total_percentage_amount' => number_format($total - $total * $coupon->discount_percentage / 100, 0, '.', ','),

                'discount_regular_amount' =>  round($total * $coupon->discount_percentage/100),
                'total_regular_amount' => number_format($total - $coupon->discount_regular, 0, '.', ','),
                ]);

            return response()->json(array(

                'success' => 'Coupon Applied Successfully'
            ));

        }else{
            return response()->json(['error' => 'Invalid Coupon']);
        }

    } // end method 


    public function CouponCalculation()
    {

        if (Session::has('coupon')) {
            return response()->json(array(
                'subtotal' => Cart::total(),
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'discount_percentage' => session()->get('coupon')['discount_percentage'],
                'discount_percentage_amount' => session()->get('coupon')['discount_percentage_amount'],

                'discount_regular' => session()->get('coupon')['discount_regular'],
                'discount_regular_amount' => session()->get('coupon')['discount_regular'],

                'total_percentage_amount' => session()->get('coupon')['total_percentage_amount'],
                'total_regular_amount' => session()->get('coupon')['total_regular_amount'],
            ));
        }else{
            return response()->json(array(
                'total' => Cart::total(),
            ));

        }

    }


    public function couponRemove(){
        Session::forget('coupon');
        return response()->json(['success' => 'Coupon Remove Successfully']);
    }


    public function checkout()
    {
        if (Auth::check()) {
            
            if (Cart::total() > 0) {

                $cart = Cart::content();
                $cart_qty = Cart::count();
                $cart_total = Cart::total();
                
                return view('frontend.checkout.checkout_view', compact('cart', 'cart_qty', 'cart_total'));

            }else{

                $notification = array(
                    'message' => 'Your Cart is Empty!',
                    'alert-type' => 'error'
                );

                return redirect()->to('/')->with($notification);
            }

        }else{

            $notification = array(
                'message' => 'You Need To Login First!',
                'alert-type' => 'error'
            );

            return redirect()->route('login')->with($notification);
        }
    }
    























}














