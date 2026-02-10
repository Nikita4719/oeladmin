@extends('admin.include.app')
@section('main-content')
<style>
    .octicon-light-bulb {
        position: absolute;
        left: 128px;
        top: 56px;
    }
    .wizard .nav-tabs li:after {
        left: -38%;
    }
</style>
    <div class="row">
        <div class="card card-buttons">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-10">
                        <ol class="breadcrumb text-muted mb-0">
                            <li class="breadcrumb-item">
                            <a href="{{route('dashboard')}}"> Dashboard</a>
                            </li>
                            <li class="breadcrumb-item text-muted">Manage OEL Presentation</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div class="card-body">
        <div class="wizard py-3 card">
                <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                    <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="Company Information">
                        <a class="nav-link active rounded-circle mx-auto d-flex align-items-center justify-content-center "
                            href="#step1" id="step1-tab" data-bs-toggle="tab" role="tab" aria-controls="step1"
                            aria-selected="true"> 1 </a>
                        
                        <span class="octicon octicon-light-bulb">Upload PDF</span>
                    </li>
                    <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="Contact Information">
                        <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center "
                            href="#step2" id="step2-tab" data-bs-toggle="tab" role="tab" aria-controls="step2"
                            aria-selected="false"> 2 </a>
                        
                        <span class="octicon octicon-light-bulb">Upload Video</span>
                    </li>
                    <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="Bank Details">
                        <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center "
                            href="#step3" id="step3-tab" data-bs-toggle="tab" role="tab" aria-controls="step3"
                            aria-selected="false"> 3 </a>
                        
                        <span class="octicon octicon-light-bulb">All Document</span>
                    </li>
                    <li class="nav-item flex-fill" role="presentation" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Admin Section">
                        <a class="nav-link rounded-circle mx-auto d-flex align-items-center justify-content-center "
                            href="#step4" id="step4-tab" data-bs-toggle="tab" role="tab" aria-controls="step4"
                            aria-selected="false"> 4 </a>
                        
                        <span class="octicon octicon-light-bulb">Demo</span>
                    </li>
                </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" role="tabpanel" id="step1" aria-labelledby="step1-tab">
                    <form>
                        <div class="mb-4 mt-md-5 title-section-adss ">
                            
                            <h4>Upload PDF</h4>
                        </div>
                        <div class="row">
                            <div class="col-md-6 input-group-create ">
                                <label class="control-label">PDF</label>
                                <input type="file" class="form-control file-input-adss" name="pdf" id="pdf">
                                <span class="text-danger pdf"></span>
                            </div>
                            <div class="col-md-6 input-group-adss">
                                <a class="btn btn btn-primary next  w-50 mt-4 float-end" id="tab1datasubmit">
                                    <span class="spinner-grow spinner-grow-sm d-none" role="status" aria-hidden="true"></span>
                                    Save
                                </a>
                            </div>

                        </div>
                        <div class="row" >
                            @foreach ($pdf as $item)
                                <div class="col-md-4 mt-2">
                                    <embed src="{{asset($item->name)}}" type="application/pdf" width="100%" height="400px">
                                </div>
                            @endforeach
                        </div>
                    </form>

                </div>
                <div class="tab-pane fade " role="tabpanel" id="step2" aria-labelledby="step2-tab">
                    <form>
                        <div class="mb-4 mt-md-5 title-section-adss ">
                            
                            <h4>Upload Video</h4>
                        </div>
                        <h3><span class="text-danger frenchise-id"></span></h3>
                        <div class="row">
                            <div class="col-md-6 input-group-adss">
                                <label>Upload Video : </label>
                                <input type="file" class="form-control file-input-adss" name="video" >
                                <span class="text-danger video"></span>
                            </div>
                            <div class="col-md-6 pt-4 ">
                                <a class="btn btn btn-primary next float-end w-25">Continue
                                <span class="spinner-grow spinner-grow-sm d-none" role="status" aria-hidden="true"></span></a>
                                <a class="btn btn btn-warning previous me-2 float-end w-25"> Back</a>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($video as $item)
                            <div class="col-md-4 mt-2">
                             <video width="440" height="260" controls>
                                 <source src="{{asset($item->name)}}" type="video/mp4">
                                 Your browser does not support the video tag.
                             </video>
                            </div>
                            @endforeach
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade mb-4 mt-md-5 title-section-adss" role="tabpanel" id="step3" aria-labelledby="step3-tab">
                    
                    <h4>All Document</h3>
                    <h3><span class="text-danger frenchise-id"></span></h3>
                    <form>
                       <div class="row">
                        <div class="col-md-6 input-group-adss">
                            <label>All Document</label>
                            <input type="file" class="form-control file-input-adss" name="document" >
                            <span class="text-danger document"></span>
                        </div>
                        <div class="col-md-6 input-group-adss">
                            <label>File Name</label>
                            <input type="text" class="form-control" name="file_name" >
                            <span class="text-danger file_name"></span>
                        </div>
                        <div class="row" >
                            {{-- @foreach ($document as $item)
                                <div class="col-md-6 input-group-adss">
                                    <iframe src="{{ asset($item->name) }}" width="100%" height="600px"></iframe>
                                    <a href="{{ asset($item->name) }}">View {{ $item->name }}</a>
                                </div>
                            @endforeach --}}
                        </div>
                       </div>

                       <div class="row">
                          <div class="col-md-12 text-center mt-4">
                              <a class="btn btn-warning previous me-2 w-25">Previous</a>
                              <a class="btn btn-primary next w-25" data-bs-toggle="modal"
                                  data-bs-target="#save_modal"><span class="spinner-grow spinner-grow-sm d-none" role="status" aria-hidden="true"></span> continue</a>
                          </div>
                    </div>
                </form>

                </div>
                <div class="tab-pane fade" role="tabpanel" id="step4" aria-labelledby="step4-tab">
                    <div class="mb-4 mt-md-5 title-section-adss">
                        
                        <h4>Demo</h4>
                    </div>
                    <div id="responseMessage"></div>
                    <form>
                        <div class="row">
                            <div class="col-md-4 text-center mx-auto">
                                <h3>PDF</h3>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>View</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($pdf->count()>0)
                                            @foreach ($manage_oel as $item)
                                            <tr>
                                                <td>
                                                    <a href="{{asset($item->name)}}" class="btn btn-success">View</a>
                                                </td>
                                                <td>
                                                    <a href="{{route('delete-manage-oel-presentation')}}/{{$item->id}}" class="btn btn-warning">Delete</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-4 text-center mx-auto">
                                <h3>Video</h3>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>View</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($video->count()>0)
                                            @foreach ($video as $item)
                                            <tr>
                                                <td>
                                                    <a href="{{asset($item->name)}}" class="btn btn-success">View</a>
                                                </td>
                                                <td>
                                                    <a href="{{route('delete-manage-oel-presentation')}}/{{$item->id}}" class="btn btn-warning">Delete</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-4 text-center mx-auto ">
                                <h3>All Document</h3>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>View</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($document->count()>0)
                                            @foreach ($document as $item)
                                            <tr>
                                                <td>
                                                    <a href="{{asset($item->name)}}" class="btn btn-success">View</a>
                                                </td>
                                                <td>
                                                    <a href="{{route('delete-manage-oel-presentation')}}/{{$item->id}}" class="btn btn-warning">Delete</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="{{ asset('assets/js/jquery-3.7.1.js') }}"></script>
<script>
    $(document).ready(function() {
        function setupCSRF() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }
        function handleNext() {
            const activeTab = $('.tab-pane.active');
            const nextTab = activeTab.next('.tab-pane');
            if (nextTab.length) {
                activeTab.removeClass('active');
                activeTab.removeClass('show');
                nextTab.addClass('active show');
                const nextTabLink = nextTab.attr('id') + '-tab';
                $('#' + nextTabLink).tab('show');
            }
        }
        function handlePrevious() {
            const activeTab = $('.tab-pane.active');
            const previousTab = activeTab.prev('.tab-pane');
            if (previousTab.length) {
                activeTab.removeClass('active');
                activeTab.removeClass('show');
                previousTab.addClass('active show');
                const previousTabLink = previousTab.attr('id') + '-tab';
                $('#' + previousTabLink).tab('show');
            }
        }
        $('.previous').on('click', handlePrevious);
        $('.next').on('click', function(event) {
        event.preventDefault();
        var spinner = this.querySelector('.spinner-grow');
        spinner.classList.remove('d-none');
        $('.next').addClass('disabled');
            var activeTab = document.querySelector('.tab-pane.fade.show.active');
            var activeForm = activeTab.querySelector('form');
            var formData = new FormData(activeForm);
            setupCSRF();
            $.ajax({
                url: `{{ route('store-manage-oel-pres') }}`,
                type: 'post',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if(response.status){
                        $('#responseMessage').html('<span class="alert alert-success">' + response.success   + '</span>');
                        setTimeout(() => {
                            var originUrl = window.location.origin;
                            window.location.href = originUrl + '/franchise/franchise-list';
                        },1000);
                    }
                    spinner.classList.add('d-none');
                    $('.next').removeClass('disabled');
                    handleNext();
                },
                error: function(xhr) {
                    spinner.classList.add('d-none');
                    $('.next').removeClass('disabled');
                    var response = JSON.parse(xhr.responseText);
                    if(response.errors && response.errors.pdf){
                        $('.pdf').html(response.errors.pdf);
                    }
                    if(response.errors && response.errors.video){
                        $('.video').html(response.errors.video);
                    }
                    if(response.errors && response.errors.document){
                        $('.document').html(response.errors.document);
                    }
                }
            });
        });
    });
    </script>
@endsection
