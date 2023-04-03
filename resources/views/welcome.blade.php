@extends('frontlayout.mainlayout') 
@section('content')
      <div class="container">
      <div class="row">
         <form method="POST" action="{{ route('login.custom') }}">
		@csrf
            <div class="row">
               <div class="col-md-9 mb-4 mb-md-0">
                  <section class="mb-4">
                        <div class="col-lg-4">
                           <div class="col-custom">
                              <input type="text" required name="name" class="form-control mt-5" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your name">
                              <button type="submit" class="btn btn-dark mt-2">Next</button>
							  <div class="text-danger pt-2">
                                    	@error('0')
	                            			{{$message}}
	                                	@enderror
	                                	@error('name')
	                            			{{$message}}
	                                	@enderror
	                            	</div>
                           </div>
                        </div>                       
                  </section>
               </div>
            </div>   
          </form>
	  </div>
	  </div>	  
@endsection	  