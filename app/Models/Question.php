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
 * Class Question
 * 
 * @property int $id
 * @property string $question
 * @property bool $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|QuestionOption[] $question_options
 * @property Collection|Quiz[] $quizzes
 *
 * @package App\Models
 */
class Question extends Model
{
	use SoftDeletes;
	protected $table = 'questions';

	protected $casts = [
		'is_active' => 'bool'
	];

	protected $fillable = [
		'question',
		'is_active'
	];

	public function question_options()
	{
		return $this->hasMany(QuestionOption::class);
	}

	public function quizzes()
	{
		return $this->belongsToMany(Quiz::class, 'quiz_questions')
					->withPivot('id', 'order', 'deleted_at')
					->withTimestamps();
	}
}
