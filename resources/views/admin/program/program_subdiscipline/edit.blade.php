@extends('admin.include.app')
@section('main-content')
    <div class="row">
        <!-- Lightbox -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Program Subdiscipline</h4>
                </div>
                <div class="card-body">
                    <div class="wizard">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" role="tabpanel" id="step1"
                                aria-labelledby="step1-tab">
                                <div class="mb-4">
                                    <h3>Edit Program Subdiscipline</h3>
                                </div>
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <form action="{{ route('update-program-subdiscipline', ['id' => $program_subdiscipline->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="program_discipline_id">Program Discipline</label>
                                        <select name="program_discipline_id" id="program_discipline_id" class="form-control" required>
                                            <option value="">-- Select Program Discipline --</option>
                                            @foreach ($program_discipline as $item)
                                                <option value="{{ $item->id }}" {{ $item->id == $program_subdiscipline->program_discipline_id ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('program_discipline_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ $program_subdiscipline->name }}" required>
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control" required>
                                            <option value="1" {{ $program_subdiscipline->status == 1 ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ $program_subdiscipline->status == 0 ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        @error('status')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Save</button>
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

