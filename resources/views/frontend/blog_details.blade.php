@extends('frontend.layouts.main')


@section('title', $blog->title ?? '')
@section('meta_title', $blog->meta_title ?? '')

@section('meta_description',$blog->meta_description ?? '')
@section('meta_keywords',$blog->meta_tags ?? '')
@section('content')
<!-- Read Progress Bar -->
<div class="reading-progress-bar"></div>

<section class="blog-hero py-2" style="background: linear-gradient(120deg, #e0c3fc 0%, #8ec5fc 100%);padding: 3rem 0;">
   <div class="university_title">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col">
               <div class="university_airplane d-flex justify-content-center"></div>
               <div class="universities_heading text-center">
                  <h1 class="fw-bold mx_rounded text-black mb-4 animate-title">{{$blog->title}}</h1>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<section class="blog-content pb-4 pt-3">
   <div class="quick_selection_title">
      <div class="rs-inner-blog orange-color">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col">
                  <div class="blog-deatails bg-white rounded-1 ">
                     <div class="blog-full  py-2">
                        <ul class="single-post-meta list-unstyled d-flex align-items-center mb-4 ">
                           <li>
                              <span class="p-date text-muted">
                                 <i class="fa fa-calendar-check-o me-2"></i>
                                 {{date('F d, Y', strtotime($blog->updated_at))}}
                              </span>
                           </li>
                        </ul>

                        <div class="bs-img mb-4 shadow-lg">
                           <img src="{{asset('imagesapi/'.$blog->image)}}"
                              alt="{{$blog->title}}"
                              class="w-100 rounded-3 shadow-sm lazy-load"  title="{{$blog->title}}">
                        </div>

                        <div class="blog-desc prose">
                           {!! $blog->text !!}
                        </div>

                        <!-- Back to top button -->
                        <!-- <button id="backToTop" class="back-to-top">
                           <i class="fa fa-arrow-up fw-bold  p-2 text-primary rounded-circle shadow-lg transition-all hover-scale glow" style="cursor: pointer;"></i>
                        </button> -->
                        <!-- Share Buttons -->
                        <div class="share-post mt-3">
                           <h5 class="fw-bold mb-3">Share this post:</h5>
                           <div class="d-flex gap-2 flex-wrap">
                              <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                 target="_blank" class="btn btn-outline-primary rounded-circle d-flex align-items-center justify-content-center" style="width:45px; height:45px;">
                                 <i class="fa-brands fa-facebook-f"></i>
                              </a>
                              <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($blog->title) }}"
                                 target="_blank" class="btn btn-outline-info rounded-circle d-flex align-items-center justify-content-center" style="width:45px; height:45px;">
                                 <i class="fa-brands fa-twitter "></i>
                              </a>

                              <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}"
                                 target="_blank"
                                 class="btn btn-outline-primary rounded-circle d-flex align-items-center justify-content-center"
                                 style="width:45px; height:45px;">
                                 <i class="fa-brands fa-linkedin-in"></i>
                              </a>

                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
</section>



<script>
   document.addEventListener('DOMContentLoaded', function() {
      // Reading Progress Bar
      const progressBar = document.querySelector('.reading-progress-bar');
      const content = document.querySelector('.blog-desc');

      window.addEventListener('scroll', () => {
         if (content) {
            const scrolled = window.scrollY;
            const contentHeight = content.offsetHeight;
            const windowHeight = window.innerHeight;
            const progress = (scrolled / (contentHeight - windowHeight)) * 100;
            progressBar.style.width = `${Math.min(100, progress)}%`;
         }
      });

      // Back to Top Button
      const backToTop = document.getElementById('backToTop');

      window.addEventListener('scroll', () => {
         if (window.scrollY > 300) {
            backToTop.classList.add('visible');
         } else {
            backToTop.classList.remove('visible');
         }
      });

      backToTop.addEventListener('click', () => {
         window.scrollTo({
            top: 0,
            behavior: 'smooth'
         });
      });

      // Lazy Loading Images
      const images = document.querySelectorAll('.lazy-load');

      const imageObserver = new IntersectionObserver((entries, observer) => {
         entries.forEach(entry => {
            if (entry.isIntersecting) {
               const img = entry.target;
               img.classList.add('loaded');
               observer.unobserve(img);
            }
         });
      });

      images.forEach(img => imageObserver.observe(img));

      // Smooth Scroll for Anchor Links
      document.querySelectorAll('a[href^="#"]').forEach(anchor => {
         anchor.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
               behavior: 'smooth'
            });
         });
      });
   });
</script>
@endsection