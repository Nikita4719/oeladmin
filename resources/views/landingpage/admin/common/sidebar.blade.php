we <!--**********************************
    Sidebar start
***********************************-->
 <div class="deznav">
     <div class="deznav-scroll">
         <ul class="metismenu" id="menu">
            @php
            $isActiveCountry = request()->routeIs('create.country') ||
                            request()->routeIs('store.country') ||
                            request()->routeIs('edit.country') ||
                            request()->routeIs('show.country');
                $isActivead = request()->routeIs('create.ads') ||
                            request()->routeIs('store.ads') ||
                            request()->routeIs('edit.ads') ||
                            request()->routeIs('show.ads');
           $isActiveCountryUniversity = request()->routeIs('create.country.university') ||
                            request()->routeIs('store.country.university') ||
                            request()->routeIs('edit.country.university') ||
                            request()->routeIs('show.country.university');
            @endphp
             <li><a class="has-arrow ai-icon" href="{{ url('admin/dashboard') }}" aria-expanded="false">
                     <i class="flaticon-dashboard-1"></i>
                     <span class="nav-text">Dashboard</span>
                 </a>
             </li>
             <li @if ($isActiveCountry || $isActivead ||  $isActiveCountryUniversity) class="mm-active" @endif ><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-battery-1"></i>
                    <span class="nav-text"> Master</span>
                </a>
                <ul aria-expanded="false" @if ($isActiveCountry || $isActivead ||  $isActiveCountryUniversity) class="mm-active mm-collapse mm-show" @endif>
                    {{-- <li  @if ($isActiveCountry ) class="mm-active" @endif><a href="{{route('getCountry')}}">Country</a></li> --}}
					{{-- <li  @if ( $isActiveState ) class="mm-active" @endif><a href="{{route('getState')}}">State</a></li> --}}
					<li  @if ( $isActivead ) class="mm-active" @endif><a href="{{route('getAds')}}">Add Ads Image</a></li>

					<li  @if ( $isActiveCountryUniversity) class="mm-active" @endif><a href="{{route('country.university')}}">About Country University</a></li>
                </ul>
            </li>
            @php
            $isActiveSlider = request()->routeIs('create.slider') ||
                              request()->routeIs('store.slider') ||
                              request()->routeIs('edit.slider') ||
                             request()->routeIs('show.slider');
            @endphp
            <li @if ($isActiveSlider) class="mm-active" @endif>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-album"></i>
                    <span class="nav-text">Slider Master</span>
                </a>
                <ul aria-expanded="false"  @if ($isActiveSlider) class="mm-active mm-collapse mm-show" @endif>
                    <li @if ($isActiveSlider) class="mm-active" @endif ><a href="{{route('getSlider')}}">Slider</a></li>
                </ul>
            </li>
            @php
        $isActiveuniversity = request()->routeIs('create.university') ||
                              request()->routeIs('store.university') ||
                              request()->routeIs('edit.university') ||
                             request()->routeIs('show.university');
            @endphp
            {{-- <li @if ($isActiveuniversity) class="mm-active" @endif>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-cloud-computing"></i>
                    <span class="nav-text">University master</span>
                </a>
                <ul aria-expanded="false" @if ($isActiveuniversity) class="mm-active mm-collapse mm-show" @endif>
                    <li  @if ($isActiveuniversity) class="mm-active" @endif><a href="{{route('getUniversity')}}"  >University</a></li>
                </ul>

            </li> --}}
            @php
          $isActivetestimonial =  request()->routeIs('create.testimonial') ||
                                request()->routeIs('store.testimonial') ||
                                request()->routeIs('edit.testimonial') ||
                                request()->routeIs('show.testimonial');
            @endphp
            <li  @if ($isActivetestimonial) class="mm-active" @endif>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-album-2"></i>
                    <span class="nav-text">Testimonials master</span>
                </a>
                <ul aria-expanded="false"  @if ($isActivetestimonial) class="mm-active mm-collapse mm-show" @endif>
                    <li @if ($isActivetestimonial) class="mm-active" @endif><a href="{{route('getTestimonials')}}" >Testimonials</a></li>
                </ul>
            </li>

            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-dislike"></i>
                    <span class="nav-text">Emails</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('emailData')}}">Emails</a></li>
                </ul>
            </li>
     </div>
 </div>
 <!--**********************************
    Sidebar end
***********************************-->
