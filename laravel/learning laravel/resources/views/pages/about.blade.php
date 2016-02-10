@extends('layouts.layout')

@section('title') 
About 
@stop

@section('body')
	<h1>This is the about page.</h1>
	
	<p>{{$companyName}}</p>
	
	@if($isUserRegistered == true)
		<p>Hello mate!</p>
	@else
		<p>Please Register!</p>
	@endif
	
	@for ($i = 0; $i < 10; $i++)
    <p>The current value is {{ $i }}</p>
	@endfor
	
	@foreach ($users as $data)
		{{$data}}<br>
	@endforeach
@stop


