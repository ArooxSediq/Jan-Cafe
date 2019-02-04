<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
	protected $guarded = [];

	public function order_lines()
	{
		return $this->hasMany(Order_line::class);
	}
}
