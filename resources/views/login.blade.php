<?php $page="login";
$mail = isset($input['email'])  ?  $input['email'] : "";
$code = isset($input['password'])  ?  base64_decode($input['password']) : "";

?>
@extends('frontlayout.mainlayout')   
@section('content')

      <div class="container my-auto">
               <div class="row">
                  <div class="col-lg-4 col-md-8 col-12 mx-auto">
                     <div class="card z-index-0 fadeIn3 fadeInBottom">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                           <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                              <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign in</h4>
                              <div class="row mt-3">
                                 <div class="col-2 text-center ms-auto">
                                    <a class="btn btn-link px-3" href="javascript:;">
                                    <i class="fa fa-facebook text-white text-lg" aria-hidden="true"></i>
                                    </a>
                                 </div>
                                 <div class="col-2 text-center px-1">
                                    <a class="btn btn-link px-3" href="javascript:;">
                                    <i class="fa fa-github text-white text-lg" aria-hidden="true"></i>
                                    </a>
                                 </div>
                                 <div class="col-2 text-center me-auto">
                                    <a class="btn btn-link px-3" href="javascript:;">
                                    <i class="fa fa-google text-white text-lg" aria-hidden="true"></i>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="card-body">
                           <form role="form" method="POST" class="text-start" id="login-frm" action="{{ route('login.custom') }}">
                           @csrf
                              <div class="input-group input-group-outline my-3">
                                 <input type="email" placeholder="Email" name="email" value="{{ $mail }}" class="form-control" required>
                                 <div class="text-danger pt-2">
                                    	@error('0')
	                            			{{$message}}
	                                	@enderror
	                                	@error('email')
	                            			{{$message}}
	                                	@enderror
	                            	</div>
                              </div>
                              <div class="input-group input-group-outline mb-3">
                                 <input type="password" placeholder="Password" id="password" class="form-control" name="password" value="{{ $code }}" required>
                                 <div class="text-danger pt-2">
	                                	@error('password')
	                            			{{$message}}
	                                	@enderror
	                            	</div>
                              </div>
                              <div class="form-check form-switch d-flex align-items-center mb-3">
                                 <input class="form-check-input" type="checkbox" id="rememberMe" checked="checked">
                                 <label class="form-check-label mb-0 ms-3" for="rememberMe">Remember me</label>
                              </div>
                              <div class="text-center">
                                 <button id='login_btn' type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Sign in</button>
                                 <span class="ajax_loading" style="display:none; margin:10px">
                                    <span class="spinner-border spinner-border-sm" role="status">
                                       <span class="visually-hidden">Loading...</span>
                                    </span>
                                 </span>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
	  
@endsection

  