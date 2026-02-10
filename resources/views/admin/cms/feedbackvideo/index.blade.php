@extends('admin.include.app')
@section('main-content')
<div class="row">
    <div class="card card-buttons">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <ol class="breadcrumb text-muted mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('feedbackvideo')}}"> Feedback Videos</a>
                        </li>
                    </ol>
                </div>
                @can('feedbackvideos.create')
                <div class="col-md-4 float-end  ">
                    <a href="{{ route('create-feedbackvideo') }}" class="btn add-btn float-end">
                        <i class="las la-plus"></i>Create Feedback Videos</a>
                </div>
                @endcan
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="card-group mb-3">
        <div class="card">
            <div class="card-body myform">
                <form id="eudcation" action="{{route('feedbackvideo')}}" method="get">
                    <div class="d-flex justify-content-start align-items-center">
                        <div class="col-md-4 ps-md-3">
                            <div class="form-floating ">
                                <input name="video_url" type="text" class="form-control " placeholder="video_url">
                                <label class="form-label">video_url</label>
                            </div>
                        </div>
                        <div class="col-md-5 row ps-md-3">
                            <div class="col ps-2">
                                <button type="submit" class="btn btn-info w-100 float-end" id="submit" value="1">Search</button>
                            </div>
                            <div class="col ps-2 float-start">
                                <a href="{{route('feedbackvideo')}}" class="btn btn-info w-100">
                                    Reset
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="table-responsive">
            <table class="table table-striped custom-table mb-0">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Video Url</th>
                        <th>Meta Tags</th>
                        <th>Meta Description</th>
                        <th>Status</th>
                        @can('feedbackvideos.update')
                        <th>Edit</th>
                        @endcan
                        @can('feedbackvideos.delete')
                        <th>Delete</th>
                        @endcan
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($feedbackvideos as $item)
                    <tr>
                        <td>{{ $loop->index + (($feedbackvideos->currentPage() - 1) * $feedbackvideos->perPage()) + 1 }}</td>
                        <td class="text-wrap">
                            
                          
                           @php
                                $link = $item->youtube_link;
                                $videoId = null;

                                if (Str::contains($link, 'youtube.com/watch?v=')) {
                                    $videoId = Str::between($link, 'watch?v=', '&') ?: Str::after($link, 'watch?v=');
                                } elseif (Str::contains($link, 'youtu.be/')) {
                                    $videoId = Str::after($link, 'youtu.be/');
                                } elseif (Str::contains($link, 'youtube.com/embed/')) {
                                    $videoId = Str::after($link, 'embed/');
                                } elseif (Str::contains($link, 'youtube.com/shorts/')) {
                                    $videoId = Str::between($link, 'shorts/', '?') ?: Str::after($link, 'shorts/');
                                }
                            @endphp

                            @if ($videoId)
                                <figure class="card" data-vid="{{ trim($videoId) }}"  width="50%"
                                    height="100">
                                    <img class="thumb"
                                         src="https://img.youtube.com/vi/{{ trim($videoId) }}/hqdefault.jpg"
                                         alt="Video Thumbnail">
                                   
                                </figure>
                            @endif
                          
                        </td>
                        <td>{{ ucfirst($item->meta_tags) }}</td>
                        <td>{{ Str::limit($item->meta_description, 30, '...') }}</td>
                        <td>{{ $item->status == 1 ? 'Publish' : 'UnPublish' }}</td>
                        @can('feedbackvideos.update')
                        <td><a href="{{route('edit-feedbackvideo',$item->id)}}" class="btn btn-info"><i class="fa-solid fa-pen"></i></a></td>
                        @endcan
                        @can('feedbackvideos.delete')
                        <td><a href="{{route('delete-feedbackvideo',$item->id)}}" class="btn btn-warning"><i class="fa-solid fa-trash"></i></a></td>
                        @endcan
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="py-3 col-md-12">
                    <div class="dataTables_paginate paging_simple_numbers" id="pagination">
                        {{$feedbackvideos->withQueryString()->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection