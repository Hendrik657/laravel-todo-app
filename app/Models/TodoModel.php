<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class todoModel extends Model
{
	protected $table = 'todos';

    protected $fillable = [
		'id',
		'title',
		'description',
		'isCompleted'
	];
}
