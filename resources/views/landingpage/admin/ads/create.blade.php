@extends('admin.include.app')
@section('main-content')
<div class="row">
    <!-- Lightbox -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0"> Manage Ads</h4>
            </div>
            <div class="card-body">
                <div class="wizard">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" role="tabpanel" id="step1"
                            aria-labelledby="step1-tab">
                            <div class="mb-4 title-section-adss">
                                <h3>
                                    Add Ads</h3>
                            </div>
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                            <form action="{{route('store.ads')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label input-group-adss">Enter title</label>
                                            <input type="text" name="title" required maxlength="199" class="form-control"
                                                placeholder="title" >
                                                <span class="text-danger name"></span>
                                        </div>
                                        @error('title')
                                            {{$message}}
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label input-group-adss">Meta Tags</label>
                                            <input type="text" name="meta_tags" required maxlength="199" class="form-control"
                                                placeholder="Meta Tags" >
                                                <span class="text-danger name"></span>
                                        </div>
                                        @error('meta_tags')
                                            {{$message}}
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label input-group-adss">Upload Image</label>
                                            <input type="file" name="image"  class="form-control file-input-adss"
                                                placeholder="name" required>
                                                <span class="text-danger name"></span>
                                            @error('images')
                                                {{$message}}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label input-group-adss">Meta Description</label>
                                            <textarea name="meta_description" id="" cols="20" rows="1" placeholder="Meta Description" class="form-control"></textarea>
                                        </div>
                                        @error('meta_description')
                                            {{$message}}
                                        @enderror
                                    </div>

                                </div>
                                <div class="text-center mt-4">
                                    <button  type="submit" class="btn btn-primary w-25 mx-auto submit-button-adss">Save</button>
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
