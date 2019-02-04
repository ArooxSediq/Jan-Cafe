<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
	//Feel free to guard any inputs for the Item Model ( Black Coffe, Esspresso etc )

	protected $guarded = ['id'];

}
