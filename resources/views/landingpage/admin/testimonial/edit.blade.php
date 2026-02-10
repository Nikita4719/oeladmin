@include('admin.common.header')
@include('admin.common.sidebar')
<style>
    #results {
        display: flex;
        flex-flow: wrap;
    }
</style>
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        {{-- <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Form</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Validation</a></li>
            </ol>
        </div> --}}
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <span id="responseMessage" class="pd-4"></span>
                    <div class="card-header">
                        <h4 class="card-title">Update Testimonials</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-validation">
                            <form action="{{route('update.testimonial',[$testimonial->id])}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label class="form-label">Enter Name</label>
                                            <input type="text" name="name" required class="form-control"
                                                placeholder="name" value="{{$testimonial->name}}" >
                                                <span class="text-danger name"></span>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label class="form-label">Enter Designation</label>
                                            <input type="text" name="designation" required class="form-control"
                                                placeholder="designation" value="{{$testimonial->designation}}">
                                                <span class="text-danger name"></span>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label class="form-label">Enter Location</label>
                                            <input type="text" name="location" required class="form-control"
                                                placeholder="location"  value="{{$testimonial->location}}">
                                                <span class="text-danger name"></span>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label class="form-label">Upload Profile Picture</label>
                                            <input type="file" name="profile_picture"  class="form-control"
                                                 >
                                                <span class="text-danger name"></span>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label class="form-label">Status </label>
                                            <select class="form-control" name="status" >
                                                <option value="1" @if ($testimonial->status == 1) @selected(true) @endif>Active</option>
                                                <option value="0" @if ($testimonial->status == 0) @selected(true) @endif>InActive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label class="form-label">Testimonial Desc</label>
                                            <textarea  name="testimonial_desc"  class="form-control" cols="30" rows="5">{!! $testimonial->testimonial_desc !!}</textarea>
                                                <span class="text-danger name"></span>
                                        </div>
                                    </div>
                                </div>
                                    <button  type="submit" class="btn btn-primary w-25 float-end">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!--**********************************
    Content body end
***********************************-->
@include('admin.common.footer')

