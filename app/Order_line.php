<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_line extends Model
{
	//Feel free to guard any of the Order_Line fields
	protected $table = 'order_lines';
 	protected $guarded = ['id'];

}
