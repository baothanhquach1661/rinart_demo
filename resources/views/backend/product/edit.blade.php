@extends('admin.admin_master')

@section('title', 'Update Product')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Updating Product</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">RinArt</a></li>
                            <li class="breadcrumb-item active">Update Product</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
    <!-- end page title -->

    <form method="post" class="custom-validation" action="{{ route('product-update') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $products->id }}">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="label-margin">Category</label>
                                        <select class="form-select" name="category_id" required>

                                            <option selected="" disabled="" value="">Select Category</option>

                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ $category->id == $products->category_id ? 'selected' : '' }}>{{ $category->category_name_en }}</option>
                                            @endforeach

                                        </select>

                                        @error('category_id')

                                            <span class="text-danger">{{ $message }}</span>

                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label class="label-margin">SubCategory</label>
                                        <select class="form-select" name="subcategory_id" required>

                                            <option selected="" disabled="" value="" required>Select SubCategory</option>
                                            @foreach($subcategory as $subcat)
                                                <option value="{{ $subcat->id }}" {{ $subcat->id == $products->subcategory_id ? 'selected' : '' }}>{{ $subcat->subcategory_name_en }}</option>
                                            @endforeach

                                        </select>

                                        @error('subcategory_id')

                                            <span class="text-danger">{{ $message }}</span>

                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label class="label-margin">Brand</label>
                                        <select class="form-select" id="validationCustom03" name="brand_id">

                                            <option selected disabled value="">Select Brand</option>

                                            @foreach($brands as $brand)
                                                <option value="{{ $brand->id }}" {{ $brand->id == $products->brand_id ? 'selected' : '' }} >{{ $brand->brand_name_en }}</option>
                                            @endforeach

                                        </select>

                                        @error('category_id')

                                            <span class="text-danger">{{ $message }}</span>

                                        @enderror

                                        <div class="invalid-feedback">
                                            Please select a valid state.
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end 1st row -->

                            <div class="col-12">
                                <div class="row">

                                    <div class="col-md-4">
                                        <label class="label-margin">Product Name En</label>
                                        <div>
                                            <input name="product_name_en" type="text" class="form-control" value="{{ $products->product_name_en }}"/>

                                            @error('product_name_en')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <label class="label-margin">Product Name Vi</label>
                                        <div>
                                            <input name="product_name_vi" type="text" class="form-control" value="{{ $products->product_name_vi }}"/>

                                            @error('product_name_vi')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="label-margin">Product Code</label>
                                        <div>
                                            <input name="product_code" type="text" class="form-control" value="{{ $products->product_code }}" required/>

                                            @error('product_code')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- end 2nd row -->       

                            <div class="col-12">
                                <div class="row">

                                    <div class="col-md-4">
                                        <label class="label-margin">Selling Price</label>
                                        <div>
                                            <input name="selling_price" type="text" class="form-control" value="{{ $products->selling_price }}" required/>

                                            @error('selling_price')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <label class="label-margin">Discount Price</label>
                                        <div>
                                            <input name="discount_price" type="text" class="form-control" value="{{ $products->discount_price }}"/>

                                            @error('discount_price')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="label-margin">Quantity</label>
                                        <div>
                                            <input name="product_qty" type="text" class="form-control" value="{{ $products->product_qty }}" required/>

                                            @error('product_qty')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>

                                    

                                </div>
                            </div> <!-- end 3rd row -->

                            <div class="col-12">
                                <div class="row">

                                    <div class="col-md-4">
                                        <label class="label-margin">Product Color</label>
                                        <div>
                                            <input  type="text" data-role="tagsinput" value="{{ $products->product_color_en }}" name="product_color_en">

                                            @error('product_color_en')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="label-margin">Product Tags En</label>
                                        <div>
                                            <input class="form-control" type="text" data-role="tagsinput" value="{{ $products->product_tags_en }}" name="product_tags_en">

                                            @error('product_tags_en')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="label-margin">Product Size</label>
                                        <div>
                                            <input  type="text" data-role="tagsinput" value="{{ $products->product_size_en }}" name="product_size_en">

                                            @error('product_size_en')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- end 4th row -->

                            <div class="col-12">
                                <div class="row">

                                    <div class="col-md-6">
                                        <label class="label-margin">Short Description En</label>
                                        <div>
                                            <input name="short_description_en" type="text" class="form-control" value="{{ $products->short_description_en }}"/>

                                            @error('short_description_en')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="label-margin">Short Description Vi</label>
                                        <div>
                                            <input name="short_description_vi" type="text" class="form-control" value="{{ $products->short_description_vi }}"/>

                                            @error('short_description_vi')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- end 6th row -->

                            <div class="col-12">
                                <div class="row">

                                    <label class="label-margin">Long Description</label>
                                    <div>

                                        <textarea name="long_description_en" id="summary-ckeditor">
                                            {!! $products->long_description_en !!}
                                        </textarea>

                                        @error('long_description_en')

                                            <span class="text-danger">{{ $message }}</span>

                                        @enderror
                                    </div>

                                </div>
                            </div> <!-- end 7th row -->

                            <br>

                            <div class="col-12">
                                <div class="row">

                                    <div class="col-md-3 label-margin">
                                        <input class="form-check-input" value="1" name="hot_deals" type="checkbox" id="formCheck2" {{ $products->hot_deals == 1 ? 'checked' : ''}}>
                                        <label class="form-check-label" for="formCheck2">
                                            Hot Deals
                                        </label>
                                    </div>

                                    <div class="col-md-3 label-margin">
                                        <input class="form-check-input" value="1" name="featured" type="checkbox" id="formCheck3" {{ $products->featured == 1 ? 'checked' : ''}}>
                                        <label class="form-check-label" for="formCheck3">
                                            Featured
                                        </label>
                                    </div>

                                    <div class="col-md-3 label-margin">
                                        <input class="form-check-input" value="1" name="special_offer" type="checkbox" id="formCheck4" {{ $products->special_offer == 1 ? 'checked' : ''}}>
                                        <label class="form-check-label" for="formCheck4">
                                            Special Offer
                                        </label>
                                    </div>

                                    <div class="col-md-3 label-margin">
                                        <input class="form-check-input" value="1" name="special_deals" type="checkbox" id="formCheck5" {{ $products->special_deals == 1 ? 'checked' : ''}}>
                                        <label class="form-check-label" for="formCheck5">
                                            Special Deals
                                        </label>
                                    </div>

                                </div>
                            </div> <!-- end 8th row -->


                            <div class="col-12">
                                <div class="row">

                                    <div class="col-md-3 label-margin">
                                        <input class="form-check-input" value="1" name="slide_products" type="checkbox" id="formCheck2" {{ $products->slide_products == 1 ? 'checked' : ''}}>
                                        <label class="form-check-label" for="formCheck2">
                                            Slide Product
                                        </label>
                                    </div>

                                    <div class="col-md-3 label-margin">
                                        <input class="form-check-input" value="1" name="new_products" type="checkbox" id="formCheck2"{{ $products->new_products == 1 ? 'checked' : ''}}>
                                        <label class="form-check-label" for="formCheck2">
                                            New Product
                                        </label>
                                    </div>

                                </div>
                            </div> <!-- end 9th row -->


                            <div class="col-12">
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="label-margin">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                Update
                                            </button>
                                            <a href="{{ url()->previous() }}" type="button" class="btn btn-secondary waves-effect">
                                                Cancel
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- end last row -->

                    </div> <!-- end body -->
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </form>




    <!-- ///////////////// Start Multiple Image Update Area ///////// -->

    <section class="content">
        <div class="row">

            <div class="col-md-12">
                <div class="box bt-3 border-info">
                    <div class="box-header">
                        <h4 class="box-title">Product Multiple Image <strong>Update</strong></h4>
                    </div>

                    <form method="post" action="{{ route('product-update-image') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row row-sm">
                            @foreach($multiImgs as $img)
                            <div class="col-md-3">

                                <div class="card">
                                    <img src="{{ asset($img->photo_name) }}" class="card-img-top" style="height: 130px; width: 180px; margin-left: auto; margin-right: auto;">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <a href="{{ route('product.multiImg.delete',$img->id) }}" class="btn btn-sm btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i> </a>
                                        </h5>
                                        <p class="card-text"> 
                                            <div class="form-group">
                                                <label class="form-control-label">Change Image <span class="tx-danger">*</span></label>
                                                <input class="form-control" type="file" name="multi_img[{{ $img->id }}]">
                                            </div> 
                                        </p>

                                    </div>
                                </div>      

                            </div><!--  end col md 3         -->   

                            @endforeach

                        </div>          

                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image">
                            {{-- <a href="{{ route('admin.product.addMoreProductMultiImg', $products->id) }}" class="btn btn-rounded btn-primary mb-5">Add More Image</a> --}}
                        </div>
                        <br>



                    </form>        





                </div>
            </div>
        </div> <!-- // end row  -->


    </section>

    <!-- ///////////////// End Multiple Image Update Area ///////// -->


    <!-- ///////////////// Start Product Thumbnail Update Area ///////// -->

    <section class="content">
        <div class="row">

            <div class="col-md-12">
                <div class="box bt-3 border-info">
                    <div class="box-header">
                        <h4 class="box-title">Product Thumbnail Image <strong>Update</strong></h4>
                    </div>

                    <form method="post" action="{{ route('product-update-thumbnail') }}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" value="{{ $products->id }}">
                        <input type="hidden" name="old_img" value="{{ $products->product_thumbnail }}">

                        <div class="row row-sm">
                            <div class="col-md-3">

                                <div class="card">
                                    <img src="{{ asset($products->product_thumbnail) }}" class="card-img-top" style="height: 130px; width: 180px; margin-left: auto; margin-right: auto;">
                                    <div class="card-body">
                                        <p class="card-text"> 
                                            <div class="form-group">
                                                <label class="form-control-label">Change Image <span class="tx-danger">*</span></label>
                                                <input name="product_thumbnail" type="file" class="form-control" onChange="mainThumbUrl(this)"/>
                                                <img src="" id="mainThmb">
                                            </div> 
                                        </p>

                                    </div>
                                </div>      

                            </div><!--  end col md 3         --> 

                        </div>          

                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-primary mb-5" value="Update Image">
                        </div>
                        <br>



                    </form>        





                </div>
            </div>
        </div> <!-- // end row  -->


    </section>

    <!-- ///////////////// End Product Thumbnail Update Area ///////// -->



























<script type="text/javascript">

      $(document).ready(function() {
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{  url('admin/category/subcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="subcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });

</script>


<script type="text/javascript">

    function mainThumbUrl(input){
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e){
                $('#mainThmb').attr('src',e.target.result).width(100).height(100);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }   

</script>


<script>
 
    $(document).ready(function(){
    $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data

          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                      return function(e) {
                          var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(100)
                  .height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                  };
              })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });

      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
  });
});

</script>

    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>

        
        CKEDITOR.replace('summary-ckeditor');


    </script>

@endsection















