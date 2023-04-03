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
 * Class Quiz
 * 
 * @property int $id
 * @property string $title
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|Question[] $questions
 *
 * @package App\Models
 */
class Quiz extends Model
{
	use SoftDeletes;
	protected $table = 'quizzes';

	protected $fillable = [
		'title'
	];

	public function questions()
	{
		return $this->belongsToMany(Question::class, 'quiz_questions')
					->withPivot('id', 'order', 'deleted_at')
					->withTimestamps();
	}
}
