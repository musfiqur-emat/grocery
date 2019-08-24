<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{

	protected $fillable = [
		'name',
		'price',
		'category',
		'aisle',
	];

	public function category() {
		return $this->hasOne(Categories::class, 'id', 'category');
	}

}
