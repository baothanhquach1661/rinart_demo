@extends('admin.admin_master')

@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">RinArt</a></li>
                    <li class="breadcrumb-item active">Change Password</li>
                </ol>
            </div>

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        

                        @if(count($errors))
                            @foreach($errors->all() as $error)
                                <p class="alert alert-danger alert-dismissible fade show">{{ $error }}</p>
                            @endforeach
                        @endif

                        <form method="POST" action="{{ route('update.password') }}" >
                            @csrf
                            <div>
                                <label for="">Current Password</label>
                                    <div class="mb-4">
                                        <input class="form-control" id="password" name="password" type="password">
                                    </div>
                                <label for="">New Password</label>
                                <div class="mb-4">
                                    <input class="form-control" id="new_password" name="new_password" type="password">
                                </div>
                                <label for="">Confirm Password</label>
                                <div class="mb-4">
                                    <input class="form-control" id="confirm_password" name="confirm_password" type="password">
                                </div>

                                <div class="mb-4" style="margin-top:10px;">
                                    <input type="submit" class="btn btn-primary btn-lg waves-effect waves-light" value="Change Password">
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



@endsection