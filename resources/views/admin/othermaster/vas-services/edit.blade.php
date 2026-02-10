@extends('admin.include.app')
@section('main-content')
    <div class="row">
        <!-- Lightbox -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0"> Vas Service Item</h4>
                </div>
                <div class="card-body">
                    <div class="wizard">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" role="tabpanel" id="step1"
                                aria-labelledby="step1-tab">
                                <div class="mb-4 title-section-adss">
                                    <h3>
                                        Edit Vas Service</h3>
                                </div>
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <form class="row " action="{{ route('update-vas-service', $vas_service->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12 input-group-adss ">
                                    <label>Title<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control " name="title" value="{{ $vas_service->title }}">
                                    @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 input-group-adss">
                                    <label>Icon Image<span class="text-danger">*</span></label>
                                    <input type="file" class="form-control file-input-adss" name="icon_file">
                                    @error('icon_file')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <img src="{{ asset('imagesapi') }}/{{ $vas_service->icon_file }}" alt="" width="100" height="100" style="margin-top: 10px;">
                                </div>
                                <div class="col-md-12 input-group-adss">
                                    <label>Content<span class="text-danger">*</span></label>
                                    <textarea class="form-control " name="content">{!! $vas_service->content !!}</textarea>
                                    @error('content')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 input-group-adss">
                                    <label>Order<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control " name="order" value="{{ $vas_service->order }}">
                                    @error('order')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 d-flex justify-content-center"><button type="submit" class="btn btn-info  w-25">Update</button>
                                    </div>
                                </form>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
