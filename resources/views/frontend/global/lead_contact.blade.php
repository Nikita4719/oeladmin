<!-- <link rel="stylesheet" href="css/intlTelInput.css?version=10">
<link rel="stylesheet" href="css/flag.css?version=10">
<style type="text/css">
	.iti__selected-flag {
	    z-index: 1;
	    position: relative;
	    display: flex;
	    align-items: center;
	    height: 100%;
	    padding: 0 6px 0 20px;
	    margin-right: 60px;
	}
</style> -->



<form id="application_guidance" method="post" action="{{url('submitApplicationGuidance')}}">
	{{csrf_field()}}
<div class="row">
										<div class="col-md-12 mb-25">
											<input class="from-control" type="text" id="agfirst_name" name="agfirst_name" placeholder="First Name *" value="{{ old('agfirst_name') }}" required="">
											@if ($errors->has('agfirst_name'))
												<span class="invalid-feedback" role="alert">
													<strong>{{ $errors->first('agfirst_name') }}</strong>
												</span>
											@endif
										</div>
										<div class="col-md-12 mb-25">
											<input class="from-control" type="text" id="aglast_name" name="aglast_name" placeholder="Last Name *" required="" value="{{ old('aglast_name') }}">
											@if ($errors->has('aglast_name'))
												<span class="invalid-feedback" role="alert">
													<strong>{{ $errors->first('aglast_name') }}</strong>
												</span>
											@endif
										</div>
										<div class="col-md-12 mb-25">
											<input class="from-control" type="text" id="agemailId" name="agemailId" placeholder="Email ID *" required="" value="{{old('agemailId')}}">

											@if ($errors->has('agemailId'))
												<span class="invalid-feedback" role="alert">
													<strong>{{ $errors->first('agemailId') }}</strong>
												</span>
											@endif
										</div>

										<div class="col-md-12 mb-25">
											<input class="from-control" type="text" id="agMobileno" name="agMobileno" placeholder="Mobile Number *" required="" value="{{old('agMobileno')}}">

											@if ($errors->has('agMobileno'))
												<span class="invalid-feedback" role="alert">
													<strong>{{ $errors->first('agMobileno') }}</strong>
												</span>
											@endif

										</div>
										<div class="col-md-12 mb-25">
											<textarea row="10" class="from-control" id="agMessage" name="agMessage" placeholder=" Message">{{old('agMessage')}}</textarea>
											@if ($errors->has('agMessage'))
												<span class="invalid-feedback" role="alert">
													<strong>{{ $errors->first('agMessage') }}</strong>
												</span>
											@endif
										</div>

										<input type="hidden" name="source" value="website">


										<h6 class="col-md-12">When do you plan to study? *</h6>


										<div class="col-md-12">
											<div class="mb-25 form-check">
												<input type="checkbox" class="form-check-input" id="isConfirm" name="isConfirm" required="">
												<label class="form-check-label" for="exampleCheck1">I confirm that I am over 16. I also agree to OEL's
												Terms &amp; Privacy Policy *</label>
											  </div>
										</div>

										<div class="col-md-12">
											<div class="mb-25 form-check">
												<input type="checkbox" class="form-check-input" id="isContacting" name="isContacting" required="">
												<label class="form-check-label" for="exampleCheck1">I agree to OEL contacting me by phone
												&amp; email to help me with my enquiry *</label>
											  </div>
										</div>

										<div class="col-md-12">
											<div class="mb-25 form-check">
												<input type="checkbox" class="form-check-input" id="isSend" name="isSend" value="1" required="">
												<label class="form-check-label" for="exampleCheck1">Yes! I'd like OEL to send me relevant information about courses, Universities, scholarships and studying abroad.</label>
											  </div>
										</div>

										<div class="col-md-12">
												<button type="submit" class="btn readon2">Get Application Guidance</button>

										</div>

									</div>

									</form>

<!--
<script src="js/intlTelInput.js"></script>
<script>
    var input = document.querySelector("#agMobileno");
    let phone_input = window.intlTelInput(input, {

    });
    let theform = document.getElementById("application_guidance");
</script> -->
