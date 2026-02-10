@extends('admin.include.app')
@section('main-content')
<div class="row">
    <div class="card card-buttons">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <ol class="breadcrumb text-muted mb-0">
                        <li class="breadcrumb-item">
                            <a href=""> Home</a>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            Manage Slider
                        </li>
                    </ol>
                </div>
                <div class="col-md-4">
                    <a href="{{ route('create.slider') }}" class="btn add-btn float-end">
                        <i class="las la-plus"></i>Create New Slider</a>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Slider Title</th>
                        <th>Country Name</th>
                        <th>State Name</th>
                        <th>Status</th>
                        <th>Show</th>
                        @can('slider.update')
                        <th>Edit</th>
                        @endcan
                        @can('slider.delete')
                        <th>Delete</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @if ($slider->count() > 0)
                    @foreach ($slider as $item)
                        <tr>
                            <td>{{ $loop->index + (($slider->currentPage() - 1) * $slider->perPage()) + 1 }}</td>
                            @if (!empty($item->title))
                                <td>{{ ucfirst($item->title) }}</td>
                            @else
                                <td>{{ 'Not Found' }}</td>
                            @endif
                            @php
                                $country = DB::table('country')->find($item->country_id);
                                $state = App\Models\Province::find($item->state_id);
                            @endphp
                            <td>{{ $country->name }}</td>
                            <td>{{ $state->name }}</td>
                            {{-- <td>
                                <div class="slideshow-container">
                                    @foreach ($item->images as $image)
                                        <div class="mySlides fade">
                                            <img src="{{ asset($image->filepath) }}" style="width:100%;height:300px" >
                                        </div>
                                    @endforeach
                                    <!-- Navigation buttons -->
                                    <a class="prev" onclick="plusSlides(-1)">❮</a>
                                    <a class="next" onclick="plusSlides(1)">❯</a>
                                </div>
                            </td> --}}
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input flexSwitchCheckChecked" data-id="{{$item->id}}" type="checkbox" role="switch" {{ $item->status == '1' ? 'checked' : '' }}>
                                </div>
                            </td>
                            @can('slider.view')
                            <td class="text-nowrap">
                                <a title="show" href="{{ route('show.slider',[$item->id]) }}" class="btn btn-warning btn-sm content-icon">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </td>
                            @endcan
                            @can('slider.update')
                            <td class="text-nowrap">
                                <a title="Edit" href="{{ route('edit.slider',[$item->id]) }}" class="btn btn-warning btn-sm content-icon">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            @endcan
                            @can('slider.delete')
                            <td class="text-nowrap">
                                <a title="Delete" href="{{ route('delete.slider',[$item->id]) }}" class="btn btn-warning btn-sm content-icon">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                            @endcan

                        </tr>
                        @php
                            $i++;
                        @endphp
                    @endforeach
                    @else
                        <tr>
                            <td colspan="4">Data Not Found!</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="dataTables_paginate paging_simple_numbers" id="pagination">
                        {{$slider->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.flexSwitchCheckChecked').change(function(){
            var isChecked = $(this).prop("checked");
            var slider_id = $(this).attr("data-id");
            var status = isChecked ? "1" : "0";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('statusUpdate') }}",
                type: 'POST',
                data: { status: status, slider_id: slider_id },
                success: function(response) {
                    window.location.reload();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
@endsection

