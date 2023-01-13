<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\Product;
use App\Models\MultiImg;
use Image;
use Carbon\Carbon;
use Illuminate\Support\Str;



class ProductController extends Controller
{

    public function index()
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategory = SubCategory::latest()->get();
        $brands = Brand::latest()->get();
        $products = Product::latest()->get();
        return view('backend.product.index', compact(
            'categories', 'brands', 'subcategory', 'products'
        ));
    }


    public function create()
    {
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('backend.product.create', compact(
            'categories', 'brands'
        ));
    }


    public function store(Request $request)
    {

        $image = $request->file('product_thumnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(630,630)->save('upload/products/thumbnail/'.$name_gen);
        $save_url = 'upload/products/thumbnail/'.$name_gen;

        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_vi' => $request->product_name_vi,

            'product_slug_en' =>  Str::slug($request->product_name_en),
            'product_slug_vi' => Str::slug($request->product_name_vi),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_vi' => $request->product_tags_vi,

            'product_size_en' => $request->product_size_en,
            'product_size_vi' => $request->product_size_vi,
            'product_color_en' => $request->product_color_en,
            'product_color_vi' => $request->product_color_vi,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,

            'short_description_en' => $request->short_description_en,
            'short_description_vi' => $request->short_description_vi,
            'long_description_en' => $request->long_description_en,
            'long_description_vi' => $request->long_description_vi,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'slide_products' => $request->slide_products,
            'new_products' => $request->new_products,

            'product_thumbnail' => $save_url,
            'status' => 1,
            'created_at' => Carbon::now(),

        ]);


        ////////// Multiple Image Upload Start ///////////

        $images = $request->file('multi_imgs');

        foreach ($images as $img) {

            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(630,630)->save('upload/products/multi-image/'.$make_name);
            $uploadPath = 'upload/products/multi-image/'.$make_name;



            MultiImg::insert([

                'product_id' => $product_id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(), 

            ]);

      }

      ////////// End Multiple Image Upload ///////////

        $notification = array(
            'message' => 'Product Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.product.index')->with($notification);

    } // end method


    public function storeImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
    
            $request->file('upload')->move(public_path('upload/products/multi-image/'), $fileName);
    
            $url = asset('upload/products/multi-image/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
        }
    }


    public function edit($id)
    {
        $multiImgs = MultiImg::where('product_id',$id)->get();

        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $products = Product::findOrFail($id);
        return view('backend.product.edit',compact('categories', 'brands', 'subcategory', 'products', 'multiImgs'));
    }


    public function updateWithoutImage(Request $request)
    {
        $product_id = $request->id;

         Product::findOrFail($product_id)->update([
        'brand_id' => $request->brand_id,
        'category_id' => $request->category_id,
        'subcategory_id' => $request->subcategory_id,
        'product_name_en' => $request->product_name_en,
        'product_name_vi' => $request->product_name_vi,
        'product_slug_en' =>  Str::slug($request->product_name_en),
        'product_slug_vi' => Str::slug($request->product_name_vi),
        'product_code' => $request->product_code,

        'product_qty' => $request->product_qty,
        'product_tags_en' => $request->product_tags_en,
        'product_tags_vi' => $request->product_tags_vi,
        'product_size_en' => $request->product_size_en,
        'product_size_vi' => $request->product_size_vi,
        'product_color_en' => $request->product_color_en,
        'product_color_vi' => $request->product_color_vi,

        'selling_price' => $request->selling_price,
        'discount_price' => $request->discount_price,
        'short_description_en' => $request->short_description_en,
        'short_description_vi' => $request->short_description_vi,
        'long_description_en' => $request->long_description_en,
        'long_description_vi' => $request->long_description_vi,

        'hot_deals' => $request->hot_deals,
        'featured' => $request->featured,
        'special_offer' => $request->special_offer,
        'special_deals' => $request->special_deals,
        'slide_products' => $request->slide_products,
        'new_products' => $request->new_products,
                  
        'status' => 1,
        'created_at' => Carbon::now(),   

      ]);

          $notification = array(
            'message' => 'Product Updated Without Image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.product.index')->with($notification);
    }


    public function updateWithImage(Request $request)
    {
        $imgs = $request->multi_img;

        foreach ($imgs as $id => $img) {
        $imgDel = MultiImg::findOrFail($id);
        unlink($imgDel->photo_name);

        $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(630,630)->save('upload/products/multi-image/'.$make_name);
        $uploadPath = 'upload/products/multi-image/'.$make_name;

        MultiImg::where('id',$id)->update([
            'photo_name' => $uploadPath,
            'updated_at' => Carbon::now(),

        ]);

     } // end foreach

       $notification = array(
            'message' => 'Product Updated With Image Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }


    public function updateThumbnail(Request $request)
    {
        $pro_id = $request->id;
        $oldImage = $request->old_img;
        unlink($oldImage);

        $image = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(630,630)->save('upload/products/thumbnail/'.$name_gen);
        $save_url = 'upload/products/thumbnail/'.$name_gen;

        Product::findOrFail($pro_id)->update([
            'product_thumbnail' => $save_url,
            'updated_at' => Carbon::now(),

        ]);

         $notification = array(
            'message' => 'Product Image Thambnail Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }


    public function multiImgDelete($id)
    {
        $oldimg = MultiImg::findOrFail($id);
        unlink($oldimg->photo_name);

        MultiImg::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Product MultiImage Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function productInactive($id)
    {
        Product::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Product Inactive',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function productactive($id)
    {
        Product::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Product Active',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function delete($id)
    {
        $product = Product::findOrFail($id);
        unlink($product->product_thumbnail);
        Product::findOrFail($id)->delete();

        $images = MultiImg::where('product_id',$id)->get();
        foreach ($images as $img) {
            unlink($img->photo_name);
            MultiImg::where('product_id',$id)->delete();
        }

        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function addMoreProductMultiImg($id)
    {
        $products = Product::where('id', $id)->get();

        return view('backend.product.storeMultiImage', compact('products'));
    }


    public function storeMultiImage(Request $request, $id)
    {

        $image = $request->file('photo_name');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(630, 630)->save('upload/products/multi-image/'.$name_gen);
        $save_url = 'upload/products/multi-image/'.$name_gen;

        MultiImg::where('product_id', $id)->update([
            'product_id' => $id,
            'photo_name' => $save_url,
        ]);

        $notification = array(
            'message' => 'New Image has been created',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.product.edit')->with($notification); 
    }














}






















