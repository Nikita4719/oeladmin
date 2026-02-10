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
                <h4 class="card-title mb-0 text-center pt-3"> Edit Data Operator</h4>
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
                            <form class="row g-4" action="{{ route('data-operator-update', $dataOperator->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="col-6">
                                    <label>Name : <span class="required_mark">*</span></label>
                                    <input type="text" name="name" class="form-control " value="{{ $dataOperator->name }}" maxlength="200" required placeholder="Enter Name " />
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label>Email: <span class="required_mark">*</span></label>
                                    <input type="email" name="email" class="form-control " value="{{ $dataOperator->email }}" maxlength="200" required placeholder="Enter Email " />
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label>Phone Number: <span class="required_mark">*</span></label>
                                    <input type="tel" name="phone_number" class="form-control " value="{{ $dataOperator->phone_number }}" maxlength="200" required placeholder="Enter Phone Number " />
                                    @error('phone_number')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label>Pincode : <span class="required_mark">*</span></label>
                                    <input type="number" name="zip" class="form-control " value="{{ $dataOperator->zip }}" maxlength="20" required placeholder="Enter Pincode " />
                                    @error('zip')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label>Address </label>
                                    <input type="text" name="address" class="form-control" value="{{ $dataOperator->address }}" maxlength="200"  placeholder="Enter Address " />
                                    @error('address')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control country formmrgin " name="country" >
                                        <option value="">-- Select Country --</option>
                                        @foreach ($countries as $item)
                                            <option value="{{ $item->id }}" {{ $dataOperator->country == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select name="state" class="form-control province_id  formmrgin">
                                        <option value="">-State/Provision -</option>
                                        @foreach ($state as $item)
                                            <option value="{{ $item->id }}" {{ $dataOperator->state == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-6">
                                    <label>City </label>
                                    <input type="tel" name="city" class="form-control " value="{{ $dataOperator->city }}" maxlength="200"  placeholder="Enter City " />
                                    @error('city')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label>Status : <span class="required_mark">*</span></label>
                                    <select class="form-control " name="status">
                                        <option value="1" {{ $dataOperator->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $dataOperator->status == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-info w-100  py-6">Submit</button>
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

