@extends('layout')


@section('title','JanCafe')

@section('content')

<div class="jumbotron">
	<h1 class="text-info">
		Our Menu
	</h1>
	<hr>

   @foreach($items as $item)
		<li>

			<a class="text" href="/items/{{ $item->id }}"> 

	    		{{ $item->name }}
	    	</a>
	    	|
	    	<span>

	    		{{ $item->price }}
	    	</span>
	    	|
	    	<span>
	    		{{ $item->description }}
	    	</span>
		</li>    	
    @endforeach


    <hr>
    <a href="items/create" class="btn btn-md btn-info">Create a new item</a>
	
</div>


 

@endsection
