@extends('admin.include.app')
@section('main-content')
@include('flash::message')
<div class="container my-lg-5 ">
    <div class="score5-form-container">
        <div class="scpre5-header mb-md-4">
            <h4 class="mb-0">Required Score for MBA - (INTERNATIONAL LEADERSHIP)</h4>
        </div>
        <form id="score5Form" class="mb-4 p-3" action="{{route('score-prog-add',$program->id)}}" method="post">
            @csrf
            @php
            $eng_id=isset($_GET['eng_id'])?$_GET['eng_id']:'';
            if($eng_id!=''){
            $details=App\Models\ProgramEnglishRequired::where('id',$eng_id)->first();
            if($details){
            $feetype=$details->type;
            $listening_score=$details->listening_score;
            $writing_score=$details->writing_score;
            $reading_score=$details->reading_score;
            $speaking_score=$details->speaking_score;
            $overall_score=$details->overall_score;
            $remarks=$details->remarks;

            }

            }

            @endphp
            <div class="score5-form-group">
                <select class="score5-select" name="type" id="usr-fees_type" required>
                    <option value="">Select Type</option>
                    @foreach ($eng_proficiency_level as $item)
                    <option value="{{$item->id}}" {{ isset($feetype)?(($feetype==$item->id)?'selected':''):((old('type')==$item->id)?'selected':'') }}>{{$item->name}}</option>
                    @endforeach
                </select>

                <span class="score5-select-label">Type</span>
            </div>
            <input type="hidden" name="program_eng_id" value="{{ $eng_id }}">

            <div class="score5-form-group remark-section" style="display: none;">

                <input id="usr-remarks" name="remarks" type="text" value="{{ isset($remarks)?$remarks:old('remarks', '') }}" class="form-control" placeholder="Remarks">
                <label for="usr-remarks" class="form-label">Remarks</label>
                <span class="text-danger error-remarks"></span>

            </div>
            <div class="score-section">
            <div class="score5-form-group">
                <input type="text" name="listening_score" class="score5-input" value="{{ isset($listening_score)?$listening_score:old('listening_score', '') }}" id="score5Listening" placeholder=" ">
                <label class="score5-label">Listening Score</label>
            </div>
            <div class="score5-form-group">
                <input type="text" name="writing_score" class="score5-input" value="{{ isset($writing_score)?$writing_score:old('writing_score' , '') }}" id="score5Writing" placeholder=" " >
                <label class="score5-label">Writing Score</label>
            </div>
            <div class="score5-form-group">
                <input type="text" name="reading_score" class="score5-input" value="{{ isset($reading_score)?$reading_score:old('reading_score' , '') }}" id="score5Reading" placeholder=" " >
                <label class="score5-label">Reading Score</label>
            </div>
            <div class="score5-form-group">
                <input type="text" name="speaking_score" class="score5-input" value="{{ isset($speaking_score)?$speaking_score:old('speaking_score' , '') }}" id="score5Speaking" placeholder=" ">
                <label class="score5-label">Speaking Score</label>
            </div>
            <div class="score5-form-group">
                <input type="text" name="overall_score" class="score5-input" value="{{ isset($overall_score)?$overall_score:old('overall_score' , '') }}" id="score5Total" placeholder=" " >
                <label class="score5-label">Over All Score</label>
            </div>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submitt" class="btn btn-info w-25">Submit</button>
            </div>
        </form>
    </div>
    <div class="table-responsive score5-form-container mt-5">
        <table class="table table-bordered score5-table">
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>Type</th>

                    <th>Listening Score</th>
                    <th>Writing Score</th>
                    <th>Reading Score</th>
                    <th>Speaking Score</th>
                    <th>Overall Score</th>
                    <th>Remarks</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="score5TableBody">
                @foreach ($data as $key=> $item)


                @if (is_object($item))
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->listening_score }}</td>
                    <td>{{ $item->writing_score }}</td>
                    <td>{{ $item->reading_score }}</td>
                    <td>{{ $item->speaking_score }}</td>
                    <td>{{ $item->overall_score }}</td>
                    <td>{{ $item->remarks }}</td>

                    <td class="txt-oflo">
                        <a href="{{route('edit-score-program',[$item->program_id,'eng_id'=>$item->id])}}">Edit</a>
                        <a href="{{route('delete-score-program',[$item->id])}}">Delete</a>
                    </td>
                </tr>
                @else
                <tr>
                    <td colspan="3">{{ __('No Record found') }}</td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection

@section('scripts')
<script src="{{ asset('assets/js/jquery-3.7.1.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.all.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {

        const typeSelect = document.getElementById('usr-fees_type');
        const scoreSection = document.querySelector('.score-section');

        const remarkSection = document.querySelector('.remark-section');
        const editType = '{{ old('type', $feetype ?? '') }}';
      
        // Check if the required elements exist before adding event listener
        if (typeSelect && remarkSection ) {
            typeSelect.addEventListener('change', function() {

                // Toggle visibility based on selected value
                if (this.value === '9') {
                    scoreSection.style.display = 'none';
                    remarkSection.style.display = 'block';
                } else {
                    scoreSection.style.display = 'block';
                    remarkSection.style.display = 'none';
                }
            });
        } else {
            console.error('One or more required elements are missing.');
        }

        if (editType === '9') {
            scoreSection.style.display = 'none';  // Hide score section if 'type' is 9 on page load
            remarkSection.style.display = 'block'; // Show remark section if 'type' is 9
        }
    });
</script>


@endsection