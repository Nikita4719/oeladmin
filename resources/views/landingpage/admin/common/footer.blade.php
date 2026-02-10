<!--**********************************
	Content body end
***********************************-->
        <!--**********************************
    Footer start
***********************************-->
<footer class="footer">
    <div class="copyright">
            <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">Skylabs</a> 2024</p>
    </div>
</footer>
<!--**********************************
    Footer end
***********************************-->

	</div>
			<script src="{{asset('admin/assets/vendor/global/global.min.js')}}"></script>
			<script src="{{asset('admin/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
	        <script src="{{asset('admin/assets/vendor/chartjs/chart.bundle.min.js')}}"></script>
            <script src="{{asset('admin/assets/vendor/owl-carousel/owl.carousel.js')}}"></script>
			<script src="{{asset('admin/assets/vendor/bootstrap-datepicker-master/js/bootstrap-datepicker.min.js')}}"></script>
            <!--<script src="{{asset('admin/assets/vendor/apexchart/apexchart.js')}}"></script>-->
            <script src="{{asset('admin/assets/vendor/jqvmap/js/jquery.vmap.min.js')}}"></script>
            <script src="{{asset('admin/assets/vendor/jqvmap/js/jquery.vmap.world.js')}}"></script>
            <script src="{{asset('admin/assets/vendor/jqvmap/js/jquery.vmap.usa.js')}}"></script>
            <script src="{{asset('admin/assets/vendor/peity/jquery.peity.min.js')}}"></script>
            <!--<script src="{{asset('admin/assets/js/dashboard/dashboard-1.js')}}"></script>-->

			<script src="{{asset('admin/assets/js/custom.min.js')}}"></script>
			<script src="{{asset('admin/assets/js/deznav-init.js')}}"></script>
            <script src="{{asset('admin/assets/js/tag.js')}}"></script>
		<script>
	function carouselReview(){
		/*  testimonial one function by = owl.carousel.js */
		jQuery('.testimonial-one').owlCarousel({
			loop:true,
			autoplay:true,
			margin:0,
			nav:true,
			dots: false,
			navText: ['<i class="las la-long-arrow-alt-left"></i>', '<i class="las la-long-arrow-alt-right"></i>'],
			responsive:{
				0:{
					items:1
				},

				480:{
					items:1
				},

				767:{
					items:1
				},
				1000:{
					items:1
				}
			}
		})
		/*Custom Navigation work*/
		jQuery('#next-slide').on('click', function(){
			$('.testimonial-one').trigger('next.owl.carousel');
		});

		jQuery('#prev-slide').on('click', function(){
			$('.testimonial-one').trigger('prev.owl.carousel');
		});
		/*Custom Navigation work*/
	}

	jQuery(window).on('load',function(){
		setTimeout(function(){
			carouselReview();
		}, 1000);
	});
</script>
</body>
</html>
