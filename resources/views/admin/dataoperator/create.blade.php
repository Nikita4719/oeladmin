@extends('admin.include.app')
@section('style')
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.min.css" rel="stylesheet">
<style>
    .octicon-light-bulb {
        position: absolute;
        left: 111px;
        top: 56px;
    }
    .wizard .nav-tabs li:after {
        left: -38%;
    }
    .form-floating {
        margin-bottom: 1rem;
    }
    .form-control {
        height: calc(2.25rem + 2px);
    }
    .formmrgin {
        margin-top: 1rem;
    }
</style>
@endsection

@section('main-content')
<div class="row">
    <!-- Lightbox -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0 text-center pt-3"> Add Data Operator</h4>
            </div>
            <div class="card-body">
                <div class="wizard">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" role="tabpanel" id="step1"
                            aria-labelledby="step1-tab">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form class="row g-4" action="{{ route('data-operator-store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="col-6 input-group-create">
                                    <label>Name : <span class="required_mark">*</span></label>
                                    <input type="text" name="name" class="form-control " value="{{ old('name') }}" maxlength="200" required placeholder="Enter Name " />
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6 input-group-create">
                                    <label>Email: <span class="required_mark">*</span></label>
                                    <input type="email" name="email" class="form-control " value="{{ old('email') }}" maxlength="200" required placeholder="Enter Email " />
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6 input-group-create">
                                    <label>Password: <span class="required_mark">*</span></label>
                                    <input type="password" name="password" class="form-control " value="{{ old('password') }}" maxlength="200" required placeholder="Enter Password " />
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6 input-group-create">
                                    <label>Phone Number: <span class="required_mark">*</span></label>
                                    <input type="tel" name="phone_number" class="form-control " value="{{ old('phone_number') }}" maxlength="200" required placeholder="Enter Phone Number " />
                                    @error('phone_number')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6 input-group-create">
                                    <label>Pincode : <span class="required_mark">*</span></label>
                                    <input type="number" name="zip" class="form-control " value="{{ old('zip') }}" maxlength="20" required placeholder="Enter Pincode " />
                                    @error('zip')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6 input-group-create">
                                    <label>Address </label>
                                    <input type="text" name="address" class="form-control" value="{{ old('address') }}" maxlength="200"  placeholder="Enter Address " />
                                    @error('address')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control country formmrgin " name="country" >
                                        <option value="">-- Select Country --</option>
                                        @foreach ($countries as $item)
                                            <option value="{{ $item->id }}" selected
                                                {{ request()->get('country_id') == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <select name="state" class="form-control province_id  formmrgin">
                                        <option value="">-State/Provision -</option>
                                    </select>
                                </div>

                                <div class="col-6 input-group-create">
                                    <label>City </label>
                                    <input type="text" name="city" class="form-control " value="{{ old('city') }}" maxlength="200"  placeholder="Enter City " />
                                    @error('city')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6 input-group-create">
                                    <label>Status : <span class="required_mark">*</span></label>
                                    <select class="form-control " name="status">
                                        <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-info col-2  py-2">Submit</button>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.all.min.js"></script>
<script>
    $(document).ready(function() {
        function setupCSRF() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }
        function fetchStates(country_id) {
            $('.province_id').empty();
            setupCSRF();
            $.ajax({
                url: "{{ route('states.get') }}",
                method: 'get',
                data: {
                    country_id: country_id
                },
                success: function(data) {
                    if ($.isEmptyObject(data)) {
                        $('.province_id').append(
                            '<option value="">No records found</option>');
                    } else {
                        $('.province_id').append('<option value=""> --State/Provision-- </option>');
                        $.each(data, function(key, value) {
                            $('.province_id').append('<option value="'+ key +'">' + value +
                                '</option>');
                        });
                    }
                }
            });
        }
        fetchStates($('.country').val());
        $('.country').change(function() {
            var country_id = $(this).val();
            fetchStates(country_id);
        });
    });
    </script>
@endsection

