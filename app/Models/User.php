<?php

/**
 * Created by Hari.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property int $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|QuizAttemptAnswer[] $quiz_attempt_answers
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'users';

	protected $casts = [
		'status' => 'int'
	];

	protected $fillable = [
		'name',
		'status'
	];

	public function quiz_attempt_answers()
	{
		return $this->hasMany(QuizAttemptAnswer::class);
	}
}
