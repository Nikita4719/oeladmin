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
                            <li class="breadcrumb-item text-muted">Upload Agreement Document</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div class="card-body card">
        <div class="wizard">
            <div class="tab-content title-section-adss " id="myTabContent">
                    <h3 class="text-center">Upload Agreement Document</h3>
                <div class="tab-pane fade show active" role="tabpanel" id="step1" aria-labelledby="step1-tab">
                    <div id="responseMessage"></div>
                    <form>
                        <div class="row">
                            <div class="col-md-6 input-group-create ">
                                <label class="control-label">Upload Agreement Document</label>
                                <input type="file" class="form-control file-input-adss" name="agreement" id="agreement">
                                <span class="text-danger agreement"></span>
                            </div>
                            <div class="col-md-6">
                                <a class="btn btn btn-primary next  w-50 mt-4 float-end" id="tab1datasubmit">
                                    <span class="spinner-grow spinner-grow-sm d-none" role="status" aria-hidden="true"></span>
                                    Save
                                </a>
                            </div>

                        </div>
                        <div class="row" >
                            @foreach ($document as $item)
                                <div class="col-md-4 mt-2">
                                    <embed src="{{asset($item->name)}}" type="application/pdf" width="100%" height="400px">
                                </div>
                            @endforeach
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
                url: `{{ route('store-manage-oel-agreement') }}`,
                type: 'post',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    $('#responseMessage').html('<span class="alert alert-success">' + response.success   + '</span>');
                    setTimeout(() => {
                        location.reload();
                    },1000);
                },
                error: function(xhr) {
                    spinner.classList.add('d-none');
                    $('.next').removeClass('disabled');
                    var response = JSON.parse(xhr.responseText);
                    if(response.errors && response.errors.agreement){
                        $('.agreement').html(response.errors.agreement);
                    }
                }
            });
        });
    });
    </script>
@endsection
