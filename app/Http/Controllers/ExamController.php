<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\QuizAttemptAnswer;
use App\Models\Question;
use App\Models\QuestionOption;
use Session;
use Response;

class ExamController extends Controller
{

	public function index(){
	   $user= Session::get('user');
	   if(isset($user['id'])){
		   return redirect("/test")->withSuccess('You are not allowed to access');
	   }		
       return view('welcome');

    }
	public function test(){
	    $user= Session::get('user');
        if(isset($user['id'])){
			$userid = $user['id'];
			$allquizzes = Quiz::get();
			$questionwithoption  = Question::with('question_options')->get();
			$quizquestionattemptanswers  = QuizQuestion::with(['quiz_attempt_answers'=> function ($query) use ($userid){
				$query->where('user_id', $userid);
			}])->get();
			$quizquestionattempt = QuizAttemptAnswer::count('user_id',$userid);
			$totalskipcount = QuizAttemptAnswer::where([['user_id', '=', $userid],['skip', '=', 1],])->count();
			
			 $quizquestionattempt_correct = QuizAttemptAnswer::join('question_options', 'question_options.id', '=', 'quiz_attempt_answers.question_option_id')
            ->where('quiz_attempt_answers.user_id', $userid )
			->where('quiz_attempt_answers.skip','=', 0 )
			 ->where('question_options.is_correct','=', 1)->count(); 
			 
			 $quizquestionattempt_wrong = QuizAttemptAnswer::join('question_options', 'question_options.id', '=', 'quiz_attempt_answers.question_option_id')
            ->where('quiz_attempt_answers.user_id', $userid )
			->where('quiz_attempt_answers.skip','=', 0 )
			 ->where('question_options.is_correct','=', 0)->count();			
			
			return view('test', ['quizzes' => $allquizzes,'questionwithoption' => $questionwithoption,
			'quizquestionattemptanswers' => $quizquestionattemptanswers,'quizquestionattempt' => $quizquestionattempt,
			'totalskipcount' => $totalskipcount,'quizquestionattempt_correct' => $quizquestionattempt_correct,
			'quizquestionattempt_wrong' => $quizquestionattempt_wrong]);
        } 
        return redirect("/")->withSuccess('You are not allowed to access');

    }

	public function submittest(Request $request){
	    $user= Session::get('user');
        if(isset($user['id'])){
			$input = $request->all();
			$findquize = QuizQuestion::where('question_id',$input['Q_id'])->first();        
			
			if($input['skip_'.$input['Q_id']]==0){
				$insert_id = QuizAttemptAnswer::create(['user_id' => $user['id'],'quiz_question_id' => $input['Q_id'],'question_option_id' => $input['option_selected_'.$input['Q_id']]])->id;
			} else {
				$insert_id = QuizAttemptAnswer::create(['user_id' => $user['id'],'quiz_question_id' => $input['Q_id'],'skip' => 1])->id;					
			}
			if($insert_id){
				return response()->json(['success' => 'Y','status'=>200, 'status_code'=>200, 'data'=>'Thanks']);				
			}else{
				return response()->json(['success' => 'N','status'=>200, 'status_code'=>404, 'data'=>'Something issue']);
			}
        } 
        return redirect("/")->withSuccess('You are not allowed to access');

    }


 
}
