   <div class="col-lg-4">
       <div class="expert-form">

        @if(!empty($bonvoyage))
            <img style="height:400px; width:400px" src="{{asset('assets/bonvoyage.gif')}}" alt="sdfsfdsd">
        @else
           <div class="exp-header mb-25">
               <h5>Quick Query</h5>
               <p class="dis">I can help you with your admission to University of York today.</p>
           </div>
           <hr>
           <div class="exp-form mt-25">

               @if ($errors->any())
               <div class="alert alert-danger">
                   <ul>
                       @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                       @endforeach
                   </ul>
               </div>
               @endif
               @if (session('message'))
               <div class="alert alert-success">
                   {{ session('message') }}
               </div>
               @endif

               <form id="application_guidance" method="post" action="{{url('query_submit')}}">
                   @csrf
                   <div class="row">
                       <div class="col-md-12 mb-25">
                           <input class="from-control" type="text" id="agfirst_name" name="agfirst_name" placeholder="First Name *" value="" required="">
                       </div>
                       <div class="col-md-12 mb-25">
                           <input class="from-control" type="text" id="aglast_name" name="aglast_name" placeholder="Last Name *" required="" value="">
                       </div>
                       <div class="col-md-12 mb-25">
                           <input class="from-control" type="text" id="agemailId" name="agemailId" placeholder="Email ID *" required="" value="">

                       </div>
                       <input type="hidden" name="type" value="User Query">

                       <div class="col-md-12 mb-25">
                           <input class="from-control" type="text" id="agMobileno" name="agMobileno" placeholder="Mobile Number *" required="" value="">


                       </div>
                       <div class="col-md-12 mb-25">
                           <textarea row="10" class="from-control" id="agMessage" name="agMessage" placeholder=" Message"></textarea>
                       </div>

                       <input type="hidden" name="source" value="website">
                       <div class="col-md-12">
                           <button type="submit" class="btn nillp mt-4">Submit</button>

                       </div>

                   </div>

               </form>
           </div>

           @endif
       </div>
   </div>
