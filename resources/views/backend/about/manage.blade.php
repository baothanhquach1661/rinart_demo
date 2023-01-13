@extends('admin.admin_master')

@section('title', 'Update About Content')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Updating Content</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">RinArt</a></li>
                            <li class="breadcrumb-item active">Update About Page Content</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
    <!-- end page title -->

    <form method="post" class="custom-validation" action="{{ route('admin.about.updateWithoutBanner') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $data->id }}">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="label-margin">About Title En</label>
                                        <div>
                                            <input name="about_title_en" type="text" class="form-control" value="{{ $data->about_title_en }}" required/>

                                            @error('about_title_en')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="label-margin">About Title Vi</label>
                                        <div>
                                            <input name="about_title_vi" type="text" class="form-control" value="{{ $data->about_title_vi }}"/>

                                            @error('about_title_vi')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="label-margin">Short Description En</label>
                                        <div>
                                            <input name="about_short_des_en" type="text" class="form-control" value="{{ $data->about_short_des_en }}"/>

                                            @error('about_short_des_en')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end 1st row -->

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="label-margin">Short Description vi</label>
                                        <div>
                                            <input name="about_short_des_vi" type="text" class="form-control" value="{{ $data->about_short_des_vi }}" required/>

                                            @error('about_short_des_vi')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="label-margin">Long Description En</label>
                                        <div>
                                            <textarea name="about_long_des_en" type="text" class="form-control" required/>{{ $data->about_long_des_en }}</textarea>

                                            @error('about_long_des_en')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="label-margin">Long Description vi</label>
                                        <div>
                                            <textarea name="about_long_des_vi" type="text" class="form-control" required/>{{ $data->about_long_des_vi }}</textarea>

                                            @error('about_long_des_vi')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end 2nd row -->

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="label-margin">About Box 1 Title En</label>
                                        <div>
                                            <input name="about_box_1_title_en" type="text" class="form-control" value="{{ $data->about_box_1_title_en }}" required/>

                                            @error('about_box_1_title_en')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="label-margin">About Box 1 Title vi</label>
                                        <div>
                                            <input name="about_box_1_title_vi" type="text" class="form-control" value="{{ $data->about_box_1_title_vi }}"/>

                                            @error('about_box_1_title_vi')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="label-margin">About Box 1 Description En</label>
                                        <div>
                                            <input name="about_box_1_des_en" type="text" class="form-control" value="{{ $data->about_box_1_des_en }}"/>

                                            @error('about_box_1_des_en')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end 3rd row -->

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="label-margin">About Box 1 Description vi</label>
                                        <div>
                                            <input name="about_box_1_des_vi" type="text" class="form-control" value="{{ $data->about_box_1_des_vi }}" required/>

                                            @error('about_box_1_des_vi')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="label-margin">About Box 2 Title En</label>
                                        <div>
                                            <input name="about_box_2_title_en" type="text" class="form-control" value="{{ $data->about_box_2_title_en }}"/>

                                            @error('about_box_2_title_en')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="label-margin">About Box 2 Title vi</label>
                                        <div>
                                            <input name="about_box_2_title_vi" type="text" class="form-control" value="{{ $data->about_box_2_title_vi }}"/>

                                            @error('about_box_2_title_vi')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end 3rd row -->

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="label-margin">About Box 2 Description En</label>
                                        <div>
                                            <input name="about_box_2_des_en" type="text" class="form-control" value="{{ $data->about_box_2_des_en }}"/>

                                            @error('about_box_2_des_en')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="label-margin">About Box 2 Description vi</label>
                                        <div>
                                            <input name="about_box_2_des_vi" type="text" class="form-control" value="{{ $data->about_box_2_des_vi }}"/>

                                            @error('about_box_2_des_vi')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="label-margin">About Box 3 Title En</label>
                                        <div>
                                            <input name="about_box_3_title_en" type="text" class="form-control" value="{{ $data->about_box_3_title_en }}"/>

                                            @error('about_box_3_title_en')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end 4th row -->

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="label-margin">About Box 3 Title vi</label>
                                        <div>
                                            <input name="about_box_3_title_vi" type="text" class="form-control" value="{{ $data->about_box_3_title_vi }}"/>

                                            @error('about_box_3_title_vi')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="label-margin">About Box 3 Description En</label>
                                        <div>
                                            <input name="about_box_3_des_en" type="text" class="form-control" value="{{ $data->about_box_3_des_en }}"/>

                                            @error('about_box_3_des_en')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="label-margin">About Box 3 Description vi</label>
                                        <div>
                                            <input name="about_box_3_des_vi" type="text" class="form-control" value="{{ $data->about_box_3_des_vi }}"/>

                                            @error('about_box_3_des_vi')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end 5th row -->

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="label-margin">Banner Title En</label>
                                        <div>
                                            <input name="about_banner_title_en" type="text" class="form-control" value="{{ $data->about_banner_title_en }}"/>

                                            @error('about_banner_title_en')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="label-margin">Banner Title En</label>
                                        <div>
                                            <input name="about_banner_title_vi" type="text" class="form-control" value="{{ $data->about_banner_title_vi }}"/>

                                            @error('about_banner_title_vi')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="label-margin">Banner Description En</label>
                                        <div>
                                            <input name="about_banner_des_en" type="text" class="form-control" value="{{ $data->about_banner_des_en }}"/>

                                            @error('about_banner_des_en')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end 6th row -->

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="label-margin">Banner Description vi</label>
                                        <div>
                                            <input name="about_banner_des_vi" type="text" class="form-control" value="{{ $data->about_banner_des_vi }}"/>

                                            @error('about_banner_des_vi')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- end 7th row -->


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
                        <h4 class="box-title">RinArt Member Image <strong>Update</strong></h4>
                    </div>

                    <form method="post" action="{{ route('about-update-teamImg') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row row-sm">
                            @foreach($teamImgs as $img)
                                <div class="col-md-3">
                                    <div class="card">
                                        <img src="{{ asset($img->photo_name) }}" class="card-img-top" style="height: 130px; width: 130px; margin-left: auto; margin-right: auto;">
                                        <div class="card-body">
                                            <p class="card-text"> 
                                                <div class="form-group">
                                                    <label class="form-control-label">Description En</label>
                                                    <input class="form-control" type="text" name="description_en" value="{{ $img->description_en }}" readonly>
                                                </div> 
                                            </p>
                                            <p class="card-text"> 
                                                <div class="form-group">
                                                    <label class="form-control-label">Description Vi</label>
                                                    <input class="form-control" type="text" name="description_vi" value="{{ $img->description_vi }}" readonly>
                                                </div> 
                                            </p>
                                            <p class="card-text"> 
                                                <div class="form-group">
                                                    <label class="form-control-label">Change Image <span class="tx-danger">*</span></label>
                                                    <input class="form-control" type="file" name="team_img[{{$img->id }}]">
                                                </div> 
                                            </p>

                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update Info" style="float: left;margin-left: 10%;">
                                            <a href="{{ route('about.teamImg.delete', $img->id) }}" class="btn btn-rounded btn-danger" id="delete" title="Delete Data" style="float: right;margin-right: 10%;">Delete</a>
                                        </div> 
                                    </div> 


                                </div><!--  end col md 3 -->    
                            @endforeach

                        </div>          

                        <div class="text-xs-right">
                            
                            <a href="{{ route('admin.about.addMoreMemberImage') }}" class="btn btn-rounded btn-primary mb-5">Add More Member</a>
                        </div>
                        <br>



                    </form> 


                </div>
            </div>
        </div> <!-- // end row  -->


    </section>

    <!-- ///////////////// End Multiple Image Update Area ///////// -->


    <!-- ///////////////// Start about banner Update Area ///////// -->

    <section class="content">
        <div class="row">

            <div class="col-md-12">
                <div class="box bt-3 border-info">
                    <div class="box-header">
                        <h4 class="box-title">About Banner <strong>Update</strong></h4>
                    </div>

                    <form method="post" action="{{ route('about-update-banner') }}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <input type="hidden" name="old_img" value="{{ $data->about_banner }}">

                        <div class="row row-sm">
                            <div class="col-md-3">

                                <div class="card">
                                    <img src="{{ asset($data->about_banner) }}" class="card-img-top" style="height: 130px; width: 180px; margin-left: auto; margin-right: auto;">
                                    <div class="card-body">
                                        <p class="card-text"> 
                                            <div class="form-group">
                                                <label class="form-control-label">Change Image <span class="tx-danger">*</span></label>
                                                <input name="about_banner" type="file" class="form-control" onChange="mainThumbUrl(this)"/>
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
                $('#mainThmb').attr('src',e.target.result).width(150).height(100);
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















