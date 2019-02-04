<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
	protected $fillable = ['name','total_price','description'];

	public function order_lines()
	{
		return $this->hasMany(Order_line::class);
	}
}
