@extends('admin.include.app')
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
                                        Add Education Level</h3>
                                </div>
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <form class="row g-4" action="{{ route('store-education-level') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('post')
                                    <div class="col-12">
                                        <label>Program Level<span class="text-danger">*</span></label>
                                        <select class="form-control " name="program_level_id" id="program_level_id" onchange="showProgramSubLevel(this.value)">
                                          <option value="">-- Select Program Level --</option>
                                          @foreach ($programlevels as $item)
                                             <option value="{{$item->id}}" {{ old('program_level_id') == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                                          @endforeach
                                        </select>
                                      @error('program_level_id')
                                          <div class="text-danger">{{ $message }}</div>
                                      @enderror
                                    </div>
                                    <div class="col-12" id="program_sublevel_div">
                                        <label>Program Sub Level<span class="text-danger">*</span></label>
                                        <select class="form-control program_sublevel_div" name="program_sublevel_id" id="program_sublevel_id">
                                        </select>
                                      @error('program_sublevel_id')
                                          <div class="text-danger">{{ $message }}</div>
                                      @enderror
                                    </div>


                                    <div class="col-12">
                                        <label>Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control " name="name">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    {{-- <div class="col-12"> --}}
                                        {{-- <label>Order<span class="text-danger">*</span></label>
                                        <input type="number" name="item_order"  class="form-control "/>
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
<script type="text/javascript">
    function showProgramSubLevel(program_level_id){
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url:"{{ route('get-program-sublevel') }}",
            method:"POST",
            data:{program_level_id:program_level_id, _token:_token},
            success:function(res){
                    if(res){
                        $(".program_sublevel_div").empty();
                        $(".program_sublevel_div").append('<option value="">--Select Program Sub Discipline--</option>');
                        $.each(res,function(key,value){
                            $(".program_sublevel_div").append('<option value="'+value.id+'">'+value.name+'</option>');
                        });
                    }else{
                        $(".program_sublevel_div").empty();
                    }
                }
        })
    }

</script>
@endsection

