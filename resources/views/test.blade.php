@extends('frontlayout.mainlayout') 
@section('content')

      <div class="container">
      <div class="row">
         @foreach ($quizzes as $quiz)
         <div class="col-md-2">{{$quiz->title}}<br>5Q/Ans</div>
         @endforeach 
         <div class="row">
            <div class="col-md-12">&nbsp;</div>
         </div>
         Total 20Q/Ans
         <hr class="hr" />
         <div class="text-start">
                           
            <div class="row">
               <div class="col-md-9 mb-4 mb-md-0">
                  <section class="mb-4">
                     <div class="row">

					 @for($i = 0; $i<count($questionwithoption); $i++)
					 @foreach ($quizquestionattemptanswers[$i]['quiz_attempt_answers'] as $all_attempt)										
					 @endforeach
					{{-- $all_attempt->skip --}} 
                        <div class="col-lg-4">
                           <div class="col-custom-test">{{$questionwithoption[$i]->question}}
						   <form  method="POST" action="" id="frm_{{$questionwithoption[$i]->id}}">
					     @csrf
						 <input type="hidden" name="Q_id" value="{{$questionwithoption[$i]->id}}"/>
						 <input type="hidden" name="skip_{{$questionwithoption[$i]->id}}" id="skip_{{$questionwithoption[$i]->id}}" value="0"/>
						   @foreach ($questionwithoption[$i]->question_options as $question_options)
						    <div class="form-check">	
							  <input class="form-check-input"
                               @if($all_attempt->question_option_id==$question_options->id && $all_attempt->skip==0) checked @endif
							  type="radio" value="{{$question_options->id}}" name="option_selected_{{$question_options->question_id}}" id="option_selected_{{$question_options->question_id}}">
							  <span class="form-check-label" for="flexRadioDefault1">
							  {{$question_options->option}}
							  </span>
							</div>
							@endforeach
							
						 <div id="btn_{{$questionwithoption[$i]->id}}" @if($all_attempt->quiz_question_id==$questionwithoption[$i]->id) style="display:none;"  @else style="display:block;" @endif>
                          <button type="button" onclick="save_test('{{$questionwithoption[$i]->id}}','s')" class="btn btn-dark mt-1">Skip</button>&nbsp;<button type="button" class="btn btn-dark mt-1" onclick="save_test('{{$questionwithoption[$i]->id}}','n')">Next</button>
						  </div>
						  
						      <span class="save_loading_{{$questionwithoption[$i]->id}}" style="display:none;margin:10px">
                                <span class="spinner-border spinner-border-sm" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </span> 
                            </span>
							<span class="text-danger pt-2" id="err_{{$questionwithoption[$i]->id}}" style="display:none;">Please select your answer.</span>
							<span class="text-success pt-2" id="success_{{$questionwithoption[$i]->id}}" style="display:none;">Thanks.</span>
						 </form>
						 </div>       
						 </div>
						
					@endfor
					
					<div class="col-lg-4">
                           <div class="col-custom-test"><h3>Result</h3>
							  <div class="row">
								<div class="col">
								  Total Q attempt
								</div>
								<div class="col">
								  ({{$quizquestionattempt}})
								</div>
							  </div>
							  <div class="row">
								<div class="col">
								  Correct Ans
								</div>
								<div class="col">
								  ({{$quizquestionattempt_correct}})
								</div>
							  </div>
							  <div class="row">
								<div class="col">
								  Wrong Ans
								</div>
								<div class="col">
								  ({{$quizquestionattempt_wrong}})
								</div>
							  </div> 
							  <div class="row">
								<div class="col">
								  Skip Ans
								</div>
								<div class="col">
								  ({{$totalskipcount}})
								</div>
							  </div>   

						 </div>       
						 </div>
					
					
                     </div>
                  </section>
               </div>
            </div>
          </div>
	   </div>
      </div>
@endsection	 
