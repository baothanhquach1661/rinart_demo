@extends('admin.admin_master')

@section('title', 'Update Footer Site')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

	<!-- start page title -->
	    <div class="row">
	        <div class="col-12">
	            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
	                <h4 class="mb-sm-0"></h4>

	                <div class="page-title-right">
	                    <ol class="breadcrumb m-0">
	                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">RinArt</a></li>
	                        <li class="breadcrumb-item active">Update Footer Site Setting</li>
	                    </ol>
	                </div>

	            </div>
	        </div>
	    </div>
	<!-- end page title -->


	<div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">

                        <form method="POST" action="{{ route('admin.footer.update') }}" enctype="multipart/form-data">
                            @csrf
                            
                            <input type="hidden" name="id" value="{{ $data->id }}">
                            <input type="hidden" name="old_image" value="{{ $data->logo_footer }}">

                            <label for="">Logo Footer</label>
                            <div class="mb-4">

                                @error('logo_footer')

                                    <span class="text-danger">{{ $message }}</span>

                                @enderror

                                <input id="image" class="form-control" name="logo_footer" type="file">
                            </div>

                            <div class="mb-4">
                                <img id="showImage" class="img-thumbnail" alt="200x200" width="200" src="{{ (!empty($data->logo_footer))? 
                                                            url($data->logo_footer):
                                                            url('upload/No_Image_Available.jpg') }}" data-holder-rendered="true">
                            </div>
                            
                            <div>
                                <label for="">Address</label>
                                <div class="mb-4">

                                	@error('address')

                                		<span class="text-danger">{{ $message }}</span>

                                	@enderror

                                    <input class="form-control" name="address" type="text" value="{{ $data->address }}" required>
                                </div>

                                <label for="">Phone 1</label>
                                <div class="mb-4">

                                    @error('phone_1')

                                        <span class="text-danger">{{ $message }}</span>

                                    @enderror

                                    <input class="form-control" name="phone_1" type="text" value="{{ $data->phone_1 }}" required>
                                </div>

                                <label for="">Phone 2</label>
                                <div class="mb-4">

                                    @error('phone_2')

                                        <span class="text-danger">{{ $message }}</span>

                                    @enderror

                                    <input class="form-control" name="phone_2" type="text" value="{{ $data->phone_2 }}" required>
                                </div>

                                <label for="">About</label>
                                <div class="mb-4">

                                	@error('about')

                                		<span class="text-danger">{{ $message }}</span>

                                	@enderror

                                    <input class="form-control" name="about" type="text" value="{{ $data->about }}" required>
                                </div>

                                <label for="">About Line 1</label>
                                <div class="mb-4">

                                	@error('about_1')

                                		<span class="text-danger">{{ $message }}</span>

                                	@enderror

                                    <input class="form-control" value="{{ $data->about_1 }}" name="about_1" type="text" required>
                                </div>

                                <label for="">About Line 2</label>
                                <div class="mb-4">

                                    @error('about_2')

                                        <span class="text-danger">{{ $message }}</span>

                                    @enderror

                                    <input class="form-control" value="{{ $data->about_2 }}" name="about_2" type="text" required>
                                </div>

                                <label for="">About Line 3</label>
                                <div class="mb-4">

                                    @error('about_3')

                                        <span class="text-danger">{{ $message }}</span>

                                    @enderror

                                    <input class="form-control" value="{{ $data->about_3 }}" name="about_3" type="text" required>
                                </div>

                                <label for="">About Line 4</label>
                                <div class="mb-4">

                                    @error('about_4')

                                        <span class="text-danger">{{ $message }}</span>

                                    @enderror

                                    <input class="form-control" value="{{ $data->about_4 }}" name="about_4" type="text" required>
                                </div>

                                <label for="">About Line 5</label>
                                <div class="mb-4">

                                    @error('about_5')

                                        <span class="text-danger">{{ $message }}</span>

                                    @enderror

                                    <input class="form-control" value="{{ $data->about_5 }}" name="about_5" type="text" required>
                                </div>

                                <label for="">Account</label>
                                <div class="mb-4">

                                    @error('account')

                                        <span class="text-danger">{{ $message }}</span>

                                    @enderror

                                    <input class="form-control" value="{{ $data->account }}" name="account" type="text" required>
                                </div>

                                <label for="">Account Line 1</label>
                                <div class="mb-4">

                                    @error('account_1')

                                        <span class="text-danger">{{ $message }}</span>

                                    @enderror

                                    <input class="form-control" value="{{ $data->account_1 }}" name="account_1" type="text" required>
                                </div>

                                <label for="">Account Line 2</label>
                                <div class="mb-4">

                                    @error('account_2')

                                        <span class="text-danger">{{ $message }}</span>

                                    @enderror

                                    <input class="form-control" value="{{ $data->account_2 }}" name="account_2" type="text" required>
                                </div>

                                <label for="">Account Line 3</label>
                                <div class="mb-4">

                                    @error('account_3')

                                        <span class="text-danger">{{ $message }}</span>

                                    @enderror

                                    <input class="form-control" value="{{ $data->account_3 }}" name="account_3" type="text" required>
                                </div>

                                <label for="">Account Line 4</label>
                                <div class="mb-4">

                                    @error('account_4')

                                        <span class="text-danger">{{ $message }}</span>

                                    @enderror

                                    <input class="form-control" value="{{ $data->account_4 }}" name="account_4" type="text" required>
                                </div>

                                <label for="">Account Line 5</label>
                                <div class="mb-4">

                                    @error('account_5')

                                        <span class="text-danger">{{ $message }}</span>

                                    @enderror

                                    <input class="form-control" value="{{ $data->account_5 }}" name="account_5" type="text" required>
                                </div>

                                <label for="">Support</label>
                                <div class="mb-4">

                                    @error('support')

                                        <span class="text-danger">{{ $message }}</span>

                                    @enderror

                                    <input class="form-control" value="{{ $data->support }}" name="support" type="text" required>
                                </div>

                                <label for="">Support Line 1</label>
                                <div class="mb-4">

                                    @error('support_1')

                                        <span class="text-danger">{{ $message }}</span>

                                    @enderror

                                    <input class="form-control" value="{{ $data->support_1 }}" name="support_1" type="text" required>
                                </div>

                                <label for="">Support Line 2</label>
                                <div class="mb-4">

                                    @error('support_2')

                                        <span class="text-danger">{{ $message }}</span>

                                    @enderror

                                    <input class="form-control" value="{{ $data->support_2 }}" name="support_2" type="text" required>
                                </div>

                                <label for="">Support Line 3</label>
                                <div class="mb-4">

                                    @error('support_3')

                                        <span class="text-danger">{{ $message }}</span>

                                    @enderror

                                    <input class="form-control" value="{{ $data->support_3 }}" name="support_3" type="text" required>
                                </div>

                                <label for="">Support Line 4</label>
                                <div class="mb-4">

                                    @error('support_4')

                                        <span class="text-danger">{{ $message }}</span>

                                    @enderror

                                    <input class="form-control" value="{{ $data->support_4 }}" name="support_4" type="text" required>
                                </div>



                                <div class="mb-4" style="margin-top:10px;">
                                    <input type="submit" class="btn btn-primary btn-lg waves-effect waves-light" value="Update">
                                </div>
                            </div>
                        </form>

                    </div>
                </div> 
            </div>
            <!-- end col -->
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















