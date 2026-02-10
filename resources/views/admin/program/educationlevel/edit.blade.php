@extends('admin.include.app')
@section('style')
    <style>
        .octicon.octicon-light-bulb {
            position: absolute;
            left: 31px;
            top: 43px;
            font-size: 12px;
            width: 99%;
            text-align: center;
        }

        .dropdown-menu {
            min-width: 150px !important;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select.css') }}">
@endsection
@section('main-content')
    <div class="row">
        <!-- Lightbox -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0"> Manage Education Level</h4>
                </div>
                <div class="card-body">
                    <div class="wizard">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" role="tabpanel" id="step1"
                                aria-labelledby="step1-tab">
                                <div class="mb-4">
                                    <h3>
                                        Edit Education Level</h3>
                                </div>
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <form class="row g-4" action="{{ route('update-education-level',$educationlevel->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('post')
                                    @if(isset($educationlevel))
                                    <div class="col-12">
                                        <label>Program Level<span class="text-danger">*</span></label>
                                        <select class="form-control " name="program_level_id" id="program_level_id" onchange="showProgramSubLevel(this.value)">
                                            @foreach ($programlevels as $item)
                                                <option value="{{$item->id}}" {{ $educationlevel->program_level_id == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('program_level_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12" id="program_sublevel_div">
                                        <label>Program Sub Level<span class="text-danger">*</span></label>
                                        <select class="form-control program_sublevel_div" name="program_sublevel_id" id="program_sublevel_id">
                                            @foreach ($program_sublevels as $item)
                                                <option value="{{$item->id}}" {{ $educationlevel->program_sublevel_id == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('program_sublevel_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endif

                                    <div class="col-12">
                                        <label>Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control " name="name" value="{{$educationlevel->name}}">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    {{-- <div class="col-12">
                                        <label>Order<span class="text-danger">*</span></label>
                                        <input type="number" name="item_order"  class="form-control " value="{{$educationlevel->item_order}}">
                                        @error('order')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div> --}}
                                    <div class="col-12"><button type="submit" class="btn btn-info  py-6">Submit</button>
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
@section('scripts')
    <script src="{{ asset('assets/js/jquery-3.7.1.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $('#summernote1').summernote({
            placeholder: ' Write Here',
            tabsize: 2,
            height: 100
        });
        $('#summernote2').summernote({
            placeholder: ' Write Here',
            tabsize: 2,
            height: 100
        });
    </script>
@endsection
