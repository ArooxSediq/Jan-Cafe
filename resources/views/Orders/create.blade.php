@extends('layout')

@section('title','Create new item')

@section('content')

	<h2>Create new order</h2>
	<hr>

	<form method="POST" action="/Orders">
		
			@csrf

		<div class="input-group">
		  <span class="input-group-addon" >Name</span>
		  <input type="text" name="name" class="form-control" placeholder="eg: Arabic Coffee" >
		</div>

		<br>
	
		<div class="input-group">
		  <span class="input-group-addon" >Item</span>
		  <select name="item_id" class="form-control">
		  	@foreach($items as $item)
		  		<option value="{{ $item->id }}">{{	$item->name	}}</option>
		  	@endforeach
		  </select>
		</div>

		<br>

		<div class="input-group">
		  <span class="input-group-addon" >Quantity</span>
		  <input type="number" name="qtt" class="form-control" >
		</div>

		<br>

		<div class="input-group">
			<span class="input-group-addon" >Note</span>
			<textarea name="note" class="form-control"></textarea>
		</div>
		
		<br>

		<input type="submit" class="btn btn-md btn-block btn-info" name="submit" value="Order">
	</form>
@endsection