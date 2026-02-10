@extends('frontend.layouts.main')
@section('title', 'Testimonials')
@section('content')
<link rel="stylesheet" href="{{asset('frontend/css/custom.css')}}">
<section class="testimonials--section">
    <div class="container">
        <div class="row text-center justify-content-center">
            <div class="col-md-8">
                <h3 class="display-4 testimonial-section--heading mb-lg-5">We are Overseas Education Lane</h3>
                <h3 class="lead testimonial-section--subheading mb-3">Your Success, Our Story: Hear from Students Who Trusted Us</h3>
            </div>
        </div>
        <div class="row">
        @foreach ($testimonials as $testimonial)
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="card testimonial--card h-auto">
                <div class="card-body text-center p-4">
                    <img src="{{asset('imagesapi/' . $testimonial->profile_picture)}}" 
                         class="rounded-circle testimonial--profile-img mb-3" 
                         width="120" 
                         height="120" 
                         alt="{{$testimonial->name}}'s profile"/>
                    
                        <h5 class="card-title fw-bold mb-1">{{$testimonial->name}}</h5>
                        <h6 class="text-muted mb-2">{{$testimonial->location}}</h6>
                    
                <div class="testimonial--content text-start" id="content-{{$loop->index}}">
                        {!! $testimonial->testimonial_desc !!}
                </div>
                    
                    <span class="read-more--btn" 
                          data-target="content-{{$loop->index}}"
                          data-expanded="false">
                        Read More
                    </span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
</section>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const buttons = document.querySelectorAll('.read-more--btn');
    buttons.forEach(button => {
        button.addEventListener('click', (e) => {
            const targetId = e.target.getAttribute('data-target');
            const content = document.getElementById(targetId);
            const isExpanded = e.target.getAttribute('data-expanded') === 'true';

            if (!isExpanded) {
                content.classList.add('expanded');
                e.target.innerText = 'Read Less';
                e.target.setAttribute('data-expanded', 'true');
            } else {
                content.classList.remove('expanded');
                e.target.innerText = 'Read More';
                e.target.setAttribute('data-expanded', 'false');
            }
        });
    });
});
</script>
@endsection
