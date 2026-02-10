@extends('admin.include.app')

@section('main-content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">

            <div class="card-header">
                <h4 class="card-title mb-0">App Settings</h4>
            </div>

            <div class="card-body">
                <div class="wizard">
                    <div class="tab-content">
                        <div class="tab-pane fade show active">

                            <div class="mb-4 title-section-adss">
                                <h3>Add App Settings</h3>
                            </div>

                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                          
                            <form class="row"
                                  action="{{ route('appsettings.store') }}"
                                  method="POST"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="col-md-12 input-group-adss">
                                    <label>Vendor Code <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="Vendor_Code">
                                </div>

                                <div class="col-md-12 input-group-adss">
                                    <label>Referral Person Name</label>
                                    <input type="text" class="form-control" name="Referral_Person_Name">
                                </div>

                                <div class="col-md-12 input-group-adss">
                                    <label>Mobile No</label>
                                    <input type="text" class="form-control" name="Mob_No">
                                </div>

                                <div class="col-md-12 input-group-adss">
                                    <label>Address</label>
                                    <textarea class="form-control" name="Address"></textarea>
                                </div>

                                <div class="col-md-12 input-group-adss">
                                    <label>Logo</label>
                                    <input type="file" class="form-control" name="logo_path">
                                </div>

                                <div class="col-md-12 input-group-adss">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description"></textarea>
                                </div>

                                <div class="col-md-12 d-flex justify-content-center mt-3">
                                    <button type="submit" class="btn btn-info w-25">
                                        Submit
                                    </button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
