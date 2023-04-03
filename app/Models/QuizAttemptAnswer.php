<?php

/**
 * Created by Hari.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class QuizAttemptAnswer
 * 
 * @property int $id
 * @property int $user_id
 * @property int $quiz_question_id
 * @property int|null $question_option_id
 * @property int $skip
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property User $user
 * @property QuestionOption|null $question_option
 * @property QuizQuestion $quiz_question
 *
 * @package App\Models
 */
class QuizAttemptAnswer extends Model
{
	use SoftDeletes;
	protected $table = 'quiz_attempt_answers';

	protected $casts = [
		'user_id' => 'int',
		'quiz_question_id' => 'int',
		'question_option_id' => 'int',
		'skip' => 'int',
		'quiz_attempt_answers' => 'array',
	];

	protected $fillable = [
		'user_id',
		'quiz_question_id',
		'question_option_id',
		'skip'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function question_option()
	{
		return $this->belongsTo(QuestionOption::class);
	}

	public function quiz_question()
	{
		return $this->belongsTo(QuizQuestion::class);
	}
}
