@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">

    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">

            </div>
        </div>
    </div>
    <div class="row profile-body">
        <!-- left wrapper start -->
        <div class="d-none d-md-block col-md-12 col-xl-3 left-wrapper">
            <div class="card rounded">
                <div class="card-body">

                   
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Name:</label>
                        {{-- <p class="text-muted">{{ $scholarProfile->spas_id }}</p> --}}
                    </div>
          
                    <div class="mt-3 d-flex social-links">
                        <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                            <i data-feather="github"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                            <i data-feather="twitter"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                            <i data-feather="instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- left wrapper end -->
        <!-- middle wrapper start -->
        {{-- <div class="col-md-6 col-xl-6 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Update Admin Profile</h6>

                        <form method="post" action = {{ route('admin.profile.store') }} class="forms-sample"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" id="exampleInputUsername1"
                                    autocomplete="off" value="{{ $profileData->username }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputName1" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputUsername1"
                                    autocomplete="off" value="{{ $profileData->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                    autocomplete="off" value="{{ $profileData->email }}">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputPhone1" class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control" id="exampleInputUsername1"
                                    autocomplete="off" value="{{ $profileData->phone }}">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputAddress1" class="form-label">Address</label>
                                <input type="text" name="address" class="form-control" id="exampleInputUsername1"
                                    autocomplete="off" value="{{ $profileData->address }}">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Photo</label>
                                <input class="form-control" name="photo" type="file" id="image">
                            </div>

                            <div class="mb-3">
                                <img id="showImage" class="wd-80 rounded-circle"
                                    src="{{ !empty($profileData->photo) ? url('upload/admin_images/' . $profileData->photo) : url('upload/no_image.jpg') }}"
                                    alt="profile">
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                        </form>

                    </div>
                </div>
            </div>
        </div> --}}
        <!-- middle wrapper end -->
        <!-- right wrapper start -->

        <!-- right wrapper end -->
    </div>
</div>

@endsection
