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
		  <span class="input-group-addon" >Price</span>
		  <input type="number" name="price" class="form-control" placeholder="eg: 3500 " >
		</div>

		<br>

		<div class="input-group">
			<span class="input-group-addon" >Description</span>
			<textarea name="description" class="form-control"></textarea>
		</div>
		
		<br>

		<input type="submit" class="btn btn-md btn-block btn-info" name="submit" value="Create">
	</form>
@endsection