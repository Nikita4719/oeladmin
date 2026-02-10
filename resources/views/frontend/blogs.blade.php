@extends('frontend.layouts.main')
@section('title', 'Blogs')
@section('content')
<link rel="stylesheet" href="{{asset('frontend/css/custom.css')}}">

<section>
    <div class="university_title ">
        <div class="container-fluid container--fluid">
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="university_airplane d-flex justify-content-center ">

                    </div>
                    <div class="universities_heading text-center">
                        <h1 class="fw-bold mx_rounded text-black">Blogs</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="quick_selection_title  my-5">
        <div class="container">
            <div class="row">
                @forelse ($blogs as $item)
                <div class="col-lg-4 col-md-6 mt-4">
                    <div class="card blogs_card blog_card shadow-sm">
                        <a class="blog-btn text-decoration-none text-dark" href="{{url('blog-details', $item->slug)}}">
                            <img src="{{asset('imagesapi/'.$item->image)}}" class="card-img-top" alt="blog"></a>
                        <div class="card-body blog_content">
                              <h6 class="fw-bold"> {!! Str::limit($item->title, 50) !!}</h6>
                            <div class="blog-button">
                                <a class="blog-btn text-decoration-none text-dark" href="{{url('blog-details', $item->slug)}}">Continue Reading <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-md-12 text-center">
                    <h3>No blogs available.</h3>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</section>
<section>

@endsection



