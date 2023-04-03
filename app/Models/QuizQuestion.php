<?php

/**
 * Created by Hari.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class QuizQuestion
 * 
 * @property int $id
 * @property int|null $quiz_id
 * @property int|null $question_id
 * @property int $order
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Question|null $question
 * @property Quiz|null $quiz
 * @property Collection|QuizAttemptAnswer[] $quiz_attempt_answers
 *
 * @package App\Models
 */
class QuizQuestion extends Model
{
	use SoftDeletes;
	protected $table = 'quiz_questions';

	protected $casts = [
		'quiz_id' => 'int',
		'question_id' => 'int',
		'order' => 'int'
	];

	protected $fillable = [
		'quiz_id',
		'question_id',
		'order'
	];

	public function question()
	{
		return $this->belongsTo(Question::class);
	}

	public function quiz()
	{
		return $this->belongsTo(Quiz::class);
	}

	public function quiz_attempt_answers()
	{
		return $this->hasMany(QuizAttemptAnswer::class);
	}
}
