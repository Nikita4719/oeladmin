@extends('admin.include.app')
@section('main-content')
    <div class="row">
        <!-- Lightbox -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0"> Visa  Sub Document Item</h4>
                </div>
                <div class="card-body">
                    <div class="wizard">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" role="tabpanel" id="step1"
                                aria-labelledby="step1-tab">
                                <div class="mb-4 title-section-adss">
                                    <h3>
                                        Edit Visa Sub Document</h3>
                                </div>
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <form class="row" action="{{ route('update-visa-sub-document-type', $visa_sub_document_type->id) }}" method="POST"
                                enctype="multipart/form-data">
                                    @csrf
                                    @method('post')
                                    <div class="col-md-12 input-group-adss">
                                        <label>Select Visa Document<span class="text-danger">*</span></label>
                                        <select class="form-select" name="visa_document_id">
                                            @foreach ($visa_documents as $visa_document)
                                                <option value="{{ $visa_document->id }}" {{ $visa_document->id == $visa_sub_document_type->visa_document_id ? 'selected' : '' }}>{{ $visa_document->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('visa_document_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 input-group-adss">
                                        <label>Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control " name="name" value="{{ $visa_sub_document_type->name }}">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 input-group-adss">
                                        <label>Status<span class="text-danger">*</span></label>
                                        <select class="form-control" name="status" required>
                                            <option value="1" {{ $visa_sub_document_type->status == 1 ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ $visa_sub_document_type->status == 0 ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        @error('status')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 d-flex justify-content-center"><button type="submit" class="btn btn-info  w-25">Submit</button>
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
