@extends('frontend.layouts.main')
@section('title', 'Blogs')

@section('content')
<style>
.thankyou-wrapper{
  width:100%;
  height:auto;
  margin:auto;
  background:#ffffff; 
  padding:10px 0px 50px;
}
.thankyou-wrapper h1{
  font:100px Arial, Helvetica, sans-serif;
  text-align:center;
  color:#333333;
  padding:0px 10px 10px;
}
.thankyou-wrapper p{
  font:26px Arial, Helvetica, sans-serif;
  text-align:center;
  color: #333333;
  padding:5px 10px 10px;
}
.thankyou-wrapper a{
  font:26px Arial, Helvetica, sans-serif;
  text-align:center;
  color:#ffffff;
  display:block;
  text-decoration:none;
  width:250px;
  background: #0066cc;
  margin:10px auto 0px;
  padding:15px 20px 15px;
  border-bottom:5px solid #0066cc;
}
.thankyou-wrapper a:hover{
  background: #004999;
  border-bottom:5px solid #004999;
}
</style>

<section class="login-main-wrapper">
  <div class="main-container">
    <div class="login-process">
      <div class="login-main-container">
        <div class="thankyou-wrapper">
          <h1>Thank You</h1>
          <p>For contacting us, we will get in touch with you soon...</p>
          <a href="{{ route('index') }}">Back to home</a>
          <div class="clr"></div>
        </div>
        <div class="clr"></div>
      </div>
    </div>
    <div class="clr"></div>
  </div>
</section>

<!-- Meta Pixel Code -->
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
<noscript>
  <img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=1184569629588476&ev=PageView&noscript=1"/>
</noscript>
<!-- End Meta Pixel Code -->

@endsection
