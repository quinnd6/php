@extends('layouts.layout')
@section('tile')
	All products
@stop

@section('body')
	@foreach($products as $product)
		<h1>{{$product->name}}</h1>
		<h3>{{$product->price}}</h3>
		<br>
	@endforeach
        
        <a href="{{url('basicrouting')}}">Basic routing</a>
        <a href="{{route('about')}}">About</a>
        <a href="{{route('product.create')}}">Create</a>
        
        <a href="{{route('test', ['id' => 15])}}">Test</a>
@stop