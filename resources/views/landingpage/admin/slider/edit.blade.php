@extends('admin.include.app')
@section('main-content')
<div class="row">
    <!-- Lightbox -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0"> Manage  Slider</h4>
            </div>
            <div class="card-body">
                <div class="wizard">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" role="tabpanel" id="step1"
                            aria-labelledby="step1-tab">
                            <div class="mb-2 title-section-adss">
                                <h3>Edit Slider</h3>
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
                            <form action="{{route('update.slider',[$slider->id])}}" method="Post">
                                @csrf
                                <div class="row g-4">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label class="form-label ">Select Country</label>
                                            <select class="form-control" name="country_id" id="country">
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}" @if ($slider->country_id == $country->id) @selected(true)   @endif>{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('country_id')
                                                    {{$message}}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label class="form-label ">Select State</label>
                                            <select class="form-control" name="state_id" id="state">
                                                <option value="">Select State</option>
                                            </select>
                                            @error('state_id')
                                                    {{$message}}
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label class="form-label ">Slider Title</label>
                                             <input type="text" class="form-control" value="{{$slider->title}}" name="title" >
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label class="form-label ">Update Slider Image</label>
                                            <input type="file" name="images[]" multiple class="form-control file-input-adss"
                                                placeholder="name" >
                                                <span class="text-danger name"></span>
                                            @error('images')
                                                {{$message}}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                    <button  type="submit" class="btn btn-primary w-25 mx-auto d-block mt-4">Update</button>
                            </form>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        function fetchStates(country_id) {
            $('#state').empty();
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            $.ajax({
                url: "{{ route('states.get') }}",
                method: 'get',
                data: {
                    country_id: country_id
                },
                success: function(data){
                    if ($.isEmptyObject(data)) {
                        $('#state').append('<option value="">No records found</option>');
                    } else {
                        $.each(data, function(key, value){
                            $('#state').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                }
            });
        }
        fetchStates($('#country').val());
        $('#country').change(function(){
            var country_id = $(this).val();
            fetchStates(country_id);
        });
    });

</script>
@endsection
