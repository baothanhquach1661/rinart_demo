@extends('admin.admin_master')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="/admin/dashboard">RinArt</a></li>
                                <li class="breadcrumb-item active">Admin Profile</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>


        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">

                        <form method="POST" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data">
                            @csrf
                            
                            <div>
                                <label for="">Name</label>
                                <div class="mb-4">
                                    <input class="form-control" name="name" value="{{ $editData->name }}" type="text">
                                </div>
                                <label for="">Email</label>
                                <div class="mb-4">
                                    <input class="form-control" name="email" value="{{ $editData->email }}" type="email">
                                </div>

                                <label for="">Profile Image</label>
                                <div class="mb-4">
                                    <input id="image" class="form-control" value="{{ $editData->profile_image }}" name="profile_photo_path" type="file">
                                </div>
                                <div class="mb-4">
                                    <img id="showImage" class="img-thumbnail" alt="200x200" width="200" src="{{ (!empty($editData->profile_photo_path))? 
                                                                url('upload/admin_images/'.$editData->profile_photo_path):
                                                                url('upload/No_Image_Available.jpg') }}" data-holder-rendered="true">
                                </div>

                                <div class="mb-4" style="margin-top:10px;">
                                    <input type="submit" class="btn btn-primary btn-lg waves-effect waves-light" value="Update Profile">
                                </div>
                            </div>
                        </form>

                    </div>
                </div> 
            </div>
            <!-- end col -->
        </div>
    </div>
</div>


<script type="text/javascript">

    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>


@endsection