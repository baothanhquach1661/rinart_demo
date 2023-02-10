@extends('admin.admin_master')

@section('title', 'Update Custom Text Site')

@section('admin')


	<!-- start page title -->
	    <div class="row">
	        <div class="col-12">
	            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
	                <h4 class="mb-sm-0"></h4>

	                <div class="page-title-right">
	                    <ol class="breadcrumb m-0">
	                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">RinArt</a></li>
	                        <li class="breadcrumb-item active">Update Text Setting</li>
	                    </ol>
	                </div>

	            </div>
	        </div>
	    </div>
	<!-- end page title -->


	<form method="post" class="custom-validation" action="{{ route('admin.custom_text.update') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $custom_text->id }}">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                            <div class="col-12">
                                <div class="row">

                                    <div class="col-md-6">
                                        <label class="label-margin">Font Size (1)</label>
                                        <div>
                                            <input required class="form-control" type="text" value="{{ $custom_text->text_1 }}" name="text_1">

                                            @error('text_1')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="label-margin">Color (1)</label>
                                        <div>
                                            <input required class="form-control" type="text" value="{{ $custom_text->text_1_color }}" name="text_1_color">

                                            @error('text_1_color')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- end 1st row -->

                            <div class="col-12">
                                <div class="row">

                                    <div class="col-md-6">
                                        <label class="label-margin">Font Size (2)</label>
                                        <div>
                                            <input required class="form-control" type="text" value="{{ $custom_text->text_2 }}" name="text_2">

                                            @error('text_2')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="label-margin">Color (2)</label>
                                        <div>
                                            <input required class="form-control" type="text" value="{{ $custom_text->text_2_color }}" name="text_2_color">

                                            @error('text_2_color')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- end 2nd row -->

                            <div class="col-12">
                                <div class="row">

                                    <div class="col-md-6">
                                        <label class="label-margin">Font Size (3)</label>
                                        <div>
                                            <input required class="form-control" type="text" value="{{ $custom_text->text_3 }}" name="text_3">

                                            @error('text_3')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="label-margin">Color (3)</label>
                                        <div>
                                            <input required class="form-control" type="text" value="{{ $custom_text->text_3_color }}" name="text_3_color">

                                            @error('text_3_color')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- end 3rd row -->

                            <div class="col-12">
                                <div class="row">

                                    <div class="col-md-6">
                                        <label class="label-margin">Font Size (4)</label>
                                        <div>
                                            <input required class="form-control" type="text" value="{{ $custom_text->text_4 }}" name="text_4">

                                            @error('text_4')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="label-margin">Color (4)</label>
                                        <div>
                                            <input required class="form-control" type="text" value="{{ $custom_text->text_4_color }}" name="text_4_color">

                                            @error('text_4_color')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- end 4th row -->

                            <div class="col-12">
                                <div class="row">

                                    <div class="col-md-6">
                                        <label class="label-margin">Font Size (5)</label>
                                        <div>
                                            <input required class="form-control" type="text" value="{{ $custom_text->text_5 }}" name="text_5">

                                            @error('text_5')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="label-margin">Color (5)</label>
                                        <div>
                                            <input required class="form-control" type="text" value="{{ $custom_text->text_5_color }}" name="text_5_color">

                                            @error('text_5_color')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- end 5th row -->

                            <div class="col-12">
                                <div class="row">

                                    <div class="col-md-6">
                                        <label class="label-margin">Font Size (6)</label>
                                        <div>
                                            <input required class="form-control" type="text" value="{{ $custom_text->text_6 }}" name="text_6">

                                            @error('text_6')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="label-margin">Color (6)</label>
                                        <div>
                                            <input required class="form-control" type="text" value="{{ $custom_text->text_6_color }}" name="text_6_color">

                                            @error('text_6_color')

                                                <span class="text-danger">{{ $message }}</span>

                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- end 6th row -->


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


@endsection






















