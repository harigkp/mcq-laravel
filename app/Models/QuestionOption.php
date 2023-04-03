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
 * Class QuestionOption
 * 
 * @property int $id
 * @property int|null $question_id
 * @property string|null $option
 * @property bool $is_correct
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Question|null $question
 * @property Collection|QuizAttemptAnswer[] $quiz_attempt_answers
 *
 * @package App\Models
 */
class QuestionOption extends Model
{
	use SoftDeletes;
	protected $table = 'question_options';

	protected $casts = [
		'question_id' => 'int',
		'is_correct' => 'bool'
	];

	protected $fillable = [
		'question_id',
		'option',
		'is_correct'
	];

	public function question()
	{
		return $this->belongsTo(Question::class);
	}

	public function quiz_attempt_answers()
	{
		return $this->hasMany(QuizAttemptAnswer::class);
	}
}
