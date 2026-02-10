<!doctype html>
<html lang="en">

<head>
    <title>Overseas Education Lane</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/home/images/favicon.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('assets/home/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/home/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/home/css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/home/css/off-canvas.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/linea-fonts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/home/fonts/flaticon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/home/css/magnific-popup.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/home/css/rsmenu-main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/home/css/rs-spacing.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/home/css/style.css') }}?version={{ time() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/home/css/new-style.css') }}?version={{ time() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/home/css/responsive.css') }}?version={{ time() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/home/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/home/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/index.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/home/js/2.3.4/owl.carousel.min.js') }}">
    <script src="{{ asset('assets/home/js/modernizr-2.8.3.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/jquery.min.js') }}"></script>

    <script src="{{ asset('assets/home/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('assets/home/js/rsmenu-main.js') }}"></script>

    <script src="{{ asset('assets/home/js/jquery.nav.js') }}"></script>

    <script src="{{ asset('assets/home/js/slick.min.js') }}"></script>

    <script src="{{ asset('assets/home/js/imagesloaded.pkgd.min.js') }}"></script>

 <!-- Google Tag Manager -->
 <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-KLHRGHLP');
</script>

    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1184569629588476');
        fbq('track', 'PageView');
    </script>

    @yield('style')

    <style>
          .select2-container--default .select2-selection--single .select2-selection__arrow b {
  border-color: #fff transparent transparent transparent;}

  .full-width-header.header {
  box-shadow: 0px 0px 22px 1px #80808070;
}


.select2-container--default.select2-container--open .select2-selection--single .select2-selection__arrow b {
    border-color: transparent transparent #80808070 transparent;
    border-width: 0 4px 5px 4px;
}

    </style>
</head>

<body>

    <div class="full-width-header header">

        <header id="rs-header" class="rs-header">
          <!-- Topbar Area Start -->
          <div class="topbar-area">
            <div class="container">
              <div class="row y-middle">
                <div class="col-lg-2">
                  <div class="logo-cat-wrap">
                    <div class="logo-part">
                      <a class="dark-logo" href="{{url('/')}}">
                        <img src="{{asset('assets/home/images/oel.png')}}" alt="" style=" max-height: 46px;">
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-9 text-left">
               <h5 style="margin: 0px;" class="pp dnone"> World's No.1 Overseas Education Platform </h5>
               </div>
              </div>
            </div>
          </div>
          <!-- Topbar Area End -->
        </header>
        <!--Header End-->
      </div>

    @yield('content')
    <footer id="rs-footer" class="rs-footer">
      <div class="owl-carousel">
            {{-- <div class="footergre">
                <div class="bb">
                    <img src="{{ asset('assets/images1/aa.png') }}" alt="Image 1">
                </div>
            </div> --}}
            @foreach ($ads as $item)
            <div><img src="{{asset( $item->image) }}" alt="Image 1" ></div>
            @endforeach

        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="desc footerclr">
                            <a href="" class="footerclr"> <i class="flaticon-location"></i> Overseas Education
                                Lane </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="desc">
                            <a href="tel:+(91) 892 992 2525" class="footerclr"> <i class="flaticon-call"></i> +(91) 892
                                992 2525</a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="desc">
                            <a href="mailto:info@overseaseducationlane.com" class="footerclr"><span
                                    class="__cf_email__"> <i class="flaticon-email"></i>
                                    info@overseaseducationlane.com</span></a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="desc">
                            <a href="mailto:help@overseaseducationlane.com" class="footerclr"><span
                                    class="__cf_email__"> <i class="flaticon-email"></i>
                                    help@overseaseducationlane.com</span></a>
                        </div>
                    </div>
                </div>
                <div class="row y-middle">

                    <div class="col-lg-7 md-mb-20">
                        <div class="copyright md-text-left">
                            <p>© 2021 Copyright <a href="https://www.overseaseducationlane.com">Overseas Education
                                    Lane</a> All Rights Reserved.</p>
                        </div>
                    </div>
                    <div class="col-lg-2 md-mb-20">
                        <span class="hitcounter">
                            <div id="sfcrrst5kwmd6ngef472jhluuyjzynf4g2a" style="width:100% !important"></div>

                                <noscript>
                                <a href="https://www.freecounterstat.com" title="free website counter"><img
                                        src="https://counter10.stat.ovh/private/freecounterstat.php?c=rrst5kwmd6ngef472jhluuyjzynf4g2a"
                                        border="0" title="free website counter" alt="free website counter"></a>
                            </noscript>
                        </span>
                    </div>
                    <div class="col-lg-3 text-right md-text-left">
                        <ul class="footer-social">
                            <li><a href="https://www.facebook.com/overseasedulane"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="https://twitter.com/LaneEducation"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://www.instagram.com/overseaseducation_lane/"><i
                                        class="fa fa-instagram"></i></a></li>
                            <li><a href="https://www.linkedin.com/company/75765761/admin/"><i
                                        class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div id="scrollUp">
        <i class="fa fa-angle-up"></i>
    </div>
    <script data-cfasync="false"
        src="{{ asset('assets/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/main.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/home/css/bootstrap-multiselect.css') }}" type="text/css">
    <script type="text/javascript" src="{{ asset('assets/home/js/bootstrap-multiselect.js') }}"></script>
    <script src="{{ asset('assets/home/js/popper.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/libs/jquery-validate/1.19.3/jquery.validate.js') }}" type="text/javascript"></script>
    @yield('js-script')
    <script type="text/javascript">
        //============Shree=============
        var testSleep = function() {
            setTimeout(function() {
                $('#exampleModal').modal('show');
            }, 10000);
        }
        //=== Shree
        function clearStorage() {
            let session = sessionStorage.getItem('register');
            if (session == null) {
                localStorage.removeItem('visible_popup');
            }
            sessionStorage.setItem('register', 1);
        }
        window.addEventListener('load', clearStorage);
    </script>
    <script type="text/javascript">
        let url = window.location.href.split("?")[0];
        if (url == 'https://www.overseaseducationlane.com/') {
            $("a[href*='" + url + "']").removeClass("current");
        } else {
            $("a[href*='" + url + "']").addClass("current");
        }
        if (!localStorage.getItem('visible_popup')) {
            testSleep();
        }
        // testSleep();
        localStorage.setItem('visible_popup', true);
        //var url = $('base').attr('href');
        $("#bookingForm").validate({
            errorElement: 'span',
            errorClass: 'error',
            rules: {
                full_name: {
                    required: true,
                },
                mobile_number: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                full_name: {
                    required: "Please enter a name",
                },
                mobile_number: {
                    required: "Please enter a Mobile Number"
                },
                email: "Please enter a valid email address"
            },
            submitHandler: function(form) {
                localStorage.setItem('visible_popup', true);
                $(form).submit();
            }
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $.ajax({
                url: "https://reactoel.skylabsapp.com/get-main-page-data",
                type: 'get',
                dataType: 'json',
                beforeSend: function() {
                    $('.loader').hide();
                },
                success: function(res) {
                    $('.main-page-bottom-content').html(res.html);
                    $('.owl-carousel').owlCarousel();
                }
            });
        });


        jQuery(document).ready(function($) {
            $('.slick.marquee').slick({
                speed: 8000,
                autoplay: true,
                autoplaySpeed: 0,
                centerMode: false,
                cssEase: 'linear',
                slidesToShow: 1,
                draggable: false,
                focusOnSelect: false,
                pauseOnFocus: false,
                pauseOnHover: false,
                slidesToScroll: 1,
                variableWidth: true,
                infinite: true,
                initialSlide: 1,
                arrows: false,
                buttons: false
            });
        });

        jQuery(document).ready(function($) {
            $('.slick.marquee_rtl').slick({
                speed: 8000,
                autoplay: true,
                autoplaySpeed: 0,
                centerMode: false,
                cssEase: 'linear',
                draggable: false,
                focusOnSelect: false,
                pauseOnFocus: false,
                pauseOnHover: false,
                slidesToShow: 1,
                slidesToScroll: 1,
                variableWidth: true,
                infinite: true,
                initialSlide: 1,
                arrows: false,
                buttons: false,
                rtl: true
            });
        });
    </script>

    <script>

        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>

    <script type="text/javascript">
        var TxtType = function(el, toRotate, period) {
            this.toRotate = toRotate;
            this.el = el;
            this.loopNum = 0;
            this.period = parseInt(period, 10) || 2000;
            this.txt = '';
            this.tick();
            this.isDeleting = false;
        };

        TxtType.prototype.tick = function() {
            var i = this.loopNum % this.toRotate.length;
            var fullTxt = this.toRotate[i];

            if (this.isDeleting) {
                this.txt = fullTxt.substring(0, this.txt.length - 1);
            } else {
                this.txt = fullTxt.substring(0, this.txt.length + 1);
            }

            this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';

            var that = this;
            var delta = 200 - Math.random() * 100;

            if (this.isDeleting) {
                delta /= 2;
            }

            if (!this.isDeleting && this.txt === fullTxt) {
                delta = this.period;
                this.isDeleting = true;
            } else if (this.isDeleting && this.txt === '') {
                this.isDeleting = false;
                this.loopNum++;
                delta = 500;
            }

            setTimeout(function() {
                that.tick();
            }, delta);
        };

        window.onload = function() {
            var elements = document.getElementsByClassName('typewrite');
            for (var i = 0; i < elements.length; i++) {
                var toRotate = elements[i].getAttribute('data-type');
                var period = elements[i].getAttribute('data-period');
                if (toRotate) {
                    new TxtType(elements[i], JSON.parse(toRotate), period);
                }
            }
            // INJECT CSS
            var css = document.createElement("style");
            css.type = "text/css";
            css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
            document.body.appendChild(css);
        };
    </script>
      <script>
        $(document).ready(function(){
          $(".owl-carousel").owlCarousel({
            loop:true, // Enable loop
            margin:10, // Margin between items
            nav:true, // Show navigation arrows
            autoplay:true, // Autoplay slides
            autoplayTimeout:3000, // Autoplay interval in milliseconds
            responsive:{
              0:{
                items:3 // Number of items to show on screen for small devices
              },
              600:{
                items:3 // Number of items to show on screen for medium devices
              },
              1000:{
                items:5 // Number of items to show on screen for large devices
              }
            }
          });
        });
      </script>

</body>
</html>
