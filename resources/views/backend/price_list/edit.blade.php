@extends('admin.admin_master')

@section('title', 'Update Price List')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Updating Price List</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">RinArt</a></li>
                            <li class="breadcrumb-item active">Update List</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
    <!-- end page title -->

    <form method="post" class="custom-validation" action="{{ route('price_list-update') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $price_list->id }}">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                            <div class="col-12">
                                <div class="row">

                                    <div class="col-md-6">
                                        <label class="label-margin">Title Name En</label>
                                        <div>
                                            <input name="title_en" type="text" class="form-control" value="{{ $price_list->title_en }}"/>

                                            @error('title_en')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <label class="label-margin">Title Name Vi</label>
                                        <div>
                                            <input name="title_vi" type="text" class="form-control" value="{{ $price_list->title_vi }}"/>

                                            @error('title_vi')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- end 1st row -->       

                            <div class="col-12">
                                <div class="row">

                                    <div class="col-md-6">
                                        <label class="label-margin">Category Name En</label>
                                        <div>
                                            <input name="name_en" type="text" class="form-control" value="{{ $price_list->name_en }}" required/>

                                            @error('name_en')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <label class="label-margin">Category Name vi</label>
                                        <div>
                                            <input name="name_vi" type="text" class="form-control" value="{{ $price_list->name_vi }}"/>

                                            @error('name_vi')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- end 2nd row -->

                            <div class="col-12">
                                <div class="row">

                                    <div class="col-md-6">
                                        <label class="label-margin">Short Description En</label>
                                        <div>
                                            <input class="form-control" type="text" value="{{ $price_list->short_description_en }}"                          name="short_description_en">

                                            @error('short_description_en')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="label-margin">Short Description vi</label>
                                        <div>
                                            <input class="form-control" type="text" value="{{ $price_list->short_description_vi }}" name="short_description_vi">

                                            @error('short_description_vi')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- end 3rd row -->

                            <div class="col-12">
                                <div class="row">

                                    <label class="label-margin">Long Description</label>
                                    <div>

                                        <textarea name="long_description_en" id="summary-ckeditor">
                                            {!! $price_list->long_description_en !!}
                                        </textarea>

                                        @error('long_description_en')

                                            <span class="text-danger">{{ $message }}</span>

                                        @enderror
                                    </div>

                                </div>
                            </div> <!-- end 4th row -->


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
                        <h4 class="box-title">Banner <strong>Update</strong></h4>
                    </div>

                    <form method="post" action="{{ route('price_list-update-banner') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row row-sm">
                            @foreach($banner as $img)
                                <div class="col-md-3">

                                    <div class="card">
                                        <img src="{{ asset($img->photo_name) }}" class="card-img-top" style="height: 130px; width: 180px; margin-left: auto; margin-right: auto;">
                                        <div class="card-body">

                                            <p class="card-text"> 
                                                <div class="form-group">
                                                    <label class="form-control-label">Change Image <span class="tx-danger">*</span></label>
                                                    <input class="form-control" type="file" name="pricing_banner[{{ $img->id }}]">
                                                </div> 
                                            </p>

                                        </div>
                                    </div>      

                                </div><!--  end col md 3  -->   
                            @endforeach

                        </div>          

                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image">
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
                        <h4 class="box-title">Price List Image <strong>Update</strong></h4>
                    </div>

                    <form method="post" action="{{ route('price_list-update-image') }}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" value="{{ $price_list->id }}">
                        <input type="hidden" name="old_img" value="{{ $price_list->image }}">

                        <div class="row row-sm">
                            <div class="col-md-3">

                                <div class="card">
                                    <img src="{{ asset($price_list->image) }}" class="card-img-top" style="height: 130px; width: 180px; margin-left: auto; margin-right: auto;">
                                    <div class="card-body">
                                        <p class="card-text"> 
                                            <div class="form-group">
                                                <label class="form-control-label">Change Image <span class="tx-danger">*</span></label>
                                                <input name="image" type="file" class="form-control" onChange="mainThumbUrl(this)"/>
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



    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>

        
        CKEDITOR.replace('summary-ckeditor');


    </script>

@endsection















