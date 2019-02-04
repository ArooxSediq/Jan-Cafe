<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

	protected $guarded = [];

	public function order_lines()
	{
		return $this->hasMany(Order_line::class);
	}
}
